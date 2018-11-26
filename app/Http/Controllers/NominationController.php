<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNominationRequest;
use App\Http\Requests\UpdateNominationRequest;
use App\Repositories\NominationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;
use App\Models\Nomination; 
use App\Models\Category; 
use App\Models\Voting; 
use App\Models\NominationUser; 

class NominationController extends AppBaseController
{
    /** @var  NominationRepository */
    private $nominationRepository;

    public function __construct(NominationRepository $nominationRepo)
    {
        $this->nominationRepository = $nominationRepo;
    }

    /**
     * Display a listing of the Nomination.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->nominationRepository->pushCriteria(new RequestCriteria($request));
        $nominations = $this->nominationRepository->all();

        return view('nominations.index')
            ->with('nominations', $nominations);
    }

    /**
     * Show the form for creating a new Nomination.
     *
     * @return Response
     */
    public function create()
    {
        return view('nominations.create');
    }

    /**
     * Store a newly created Nomination in storage.
     *
     * @param CreateNominationRequest $request
     *
     * @return Response
     */
    public function store(CreateNominationRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;

        // check db if nomination already exists
        $nominationCheck = Nomination::where('name', $request->input('name'))->first();

        if ($nominationCheck) {
            if ($nominationCheck['user_id'] != Auth::user()->id) {
                $no_of_nominations = $nominationCheck['no_of_nominations']; 
                $input['no_of_nominations'] = $no_of_nominations + 1;

                $this->nominationRepository->update([
                    'no_of_nominations' => $input['no_of_nominations']
                    ],
                    $nominationCheck['id']
                );

                NominationUser::create([
                    'user_id' => Auth::user()->id,
                    'category_id' => $request->input('category_id'),
                    'nomination_id' => $nominationCheck['id']
                ]);
            }
            
            Flash::success('You have already nominated ' . $nominationCheck['name']);
            
            return redirect()->back();
        }
        else {
            $input['no_of_nominations']  = 1;
            $nomination = $this->nominationRepository->create($input);
                
            NominationUser::create([
                'user_id' => Auth::user()->id,
                'category_id' => $request->input('category_id'),
                'nomination_id' => $nomination->id
            ]);
        }
        
        Flash::success('Nomination submitted successfully.');

        return redirect()->back();
    }

    /**
     * Display the specified Nomination.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $nomination = $this->nominationRepository->findWithoutFail($id);

        if (empty($nomination)) {
            Flash::error('Nomination not found');

            return redirect(route('nominations.index'));
        }

        return view('nominations.show')->with('nomination', $nomination);
    }

    /**
     * Show the form for editing the specified Nomination.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $nomination = $this->nominationRepository->findWithoutFail($id);

        $categories = Category::all();

        if (empty($nomination)) {
            Flash::error('Nomination not found');

            return redirect(route('nominations.index'));
        }

        return view('nominations.edit')->with('nomination', $nomination)->with('categories', $categories);
    }

    /**
     * Update the specified Nomination in storage.
     *
     * @param  int              $id
     * @param UpdateNominationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNominationRequest $request)
    {
        $nomination = $this->nominationRepository->findWithoutFail($id);

        if (empty($nomination)) {
            Flash::error('Nomination not found');
            
            return redirect(route('categories.show', ['id' => $id]));

        }

        $nomination = $this->nominationRepository->update($request->all(), $id);

        Flash::success('Nomination updated successfully.');

        return redirect(route('categories.show', ['id' => $id]));
    }

    /**
     * Remove the specified Nomination from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nomination = $this->nominationRepository->findWithoutFail($id);

        if (empty($nomination)) {
            Flash::error('Nomination not found');

            return redirect(route('nominations.index'));
        }

        $this->nominationRepository->delete($id);

        Flash::success('Nomination deleted successfully.');

        return redirect(route('nominations.index'));
    }

    public function vote(Request $request) {
        // create the voting record in the db
        if (Auth::check()) {
            // check if user has voted before
            $checkVote = Voting::where('user_id', Auth::user()->id)->where('category_id', $request->category_id)->first();

            if ($checkVote) {
                Flash::error('Sorry, you have voted before');

                return redirect()->back();
            }
            
            $voting = Voting::create([
                'user_id' => Auth::user()->id,
                'category_id' => $request->category_id,
                'nomination_id' => $request->nomination_id
            ]);
        }

        // get nominations/no of votes from db
        $getNomination = Nomination::where('id', $request->nomination_id)->first();

        // update vote count by incresing it by 1 in the nomination table
        $nomination = Nomination::where('id', $request->nomination_id)->update([
            'no_of_votes' => $getNomination->no_of_votes + 1
        ]);

        if ($nomination) {
            Flash::success('Thank you. You have voted Successfully');

            return redirect()->back();
        }
    }
}
