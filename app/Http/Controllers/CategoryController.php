<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repositories\CategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\NominationUser;
use App\Models\Nomination;
use App\Models\Voting;
use Auth;

class CategoryController extends AppBaseController
{
    /** @var  CategoryRepository */
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepository = $categoryRepo;
    }

    /**
     * Display a listing of the Category.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->categoryRepository->pushCriteria(new RequestCriteria($request));
        $categories = $this->categoryRepository->all();

        return view('categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new Category.
     *
     * @return Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created Category in storage.
     *
     * @param CreateCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $input = $request->all();

        $category = $this->categoryRepository->create($input);

        Flash::success('Category saved successfully.');

        return redirect(route('categories.index'));
    }

    /**
     * Display the specified Category.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        

        $nominations = Nomination::all();
        $selectedNominations = Nomination::where('is_admin_selected', 1)->get();

        // check if user has voted before
        $checkVote = Voting::where('user_id', Auth::user()->id)->where('category_id', $category->id)->first();

        if ($checkVote) {
            Flash::error('Sorry, you have voted before');

            
            return view('categories.show')->with('category', $category)
                                          ->with('nominations', $nominations)
                                          ->with('selectedNominations', $selectedNominations)
                                          ->with('checkVote', $checkVote);
        }

        // check if the logged in viewer has alredy nominated a candidate in this category
        $hasNominatedBefore = 0;
        $nominationUser = NominationUser::where('user_id', Auth::user()->id)->where('category_id', $id)->first();

        if ($nominationUser) {
            $hasNominatedBefore = 1;
             // get the details of the candidate nominated
            $nominatedCandidate = Nomination::find($nominationUser['nomination_id']);

            return view('categories.show')->with('category', $category)
                                          ->with('nominatedCandidate', $nominatedCandidate)
                                          ->with('hasNominatedBefore', $hasNominatedBefore)
                                          ->with('nominations', $nominations)
                                          ->with('selectedNominations', $selectedNominations);
        }
    }

    /**
     * Show the form for editing the specified Category.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        return view('categories.edit')->with('category', $category);
    }

    /**
     * Update the specified Category in storage.
     *
     * @param  int              $id
     * @param UpdateCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategoryRequest $request)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        $category = $this->categoryRepository->update($request->all(), $id);

        Flash::success('Category updated successfully.');

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified Category from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        $this->categoryRepository->delete($id);

        Flash::success('Category deleted successfully.');

        return redirect(route('categories.index'));
    }
}
