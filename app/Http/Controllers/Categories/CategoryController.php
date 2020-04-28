<?php

namespace App\Http\Controllers\Categories;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\CategoryStoreRequest;
use App\Http\Requests\Categories\CategoryUpdateRequest;
use App\Repositiroes\Contracts\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    /**
     * CategoryIndexService constructor.
     * @param CategoryRepositoryInterface $categories
     */
    public function __construct(CategoryRepositoryInterface $categories)
    {
        $this->categories = $categories;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = $this->categories->withCount(['lessons', 'posts'])->inBand(auth()->user()->band_id)->get();

        return view('categories.index', ['bandCategories' => $categories]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', new Category());

        return view('categories.create');
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Category $category)
    {
        $this->authorize('view', $category);

        return view('categories.show', [
            'category' => $category,
            'lessons' => $category->lessons()->latest()->limit(5)->get(),
            'posts' => $category->posts()->latest()->limit(5)->get(),
            'lessonsCount' => $category->lessons()->count(),
            'postsCount' => $category->posts()->count(),
        ]);
    }
    /**
     * @param CategoryStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(CategoryStoreRequest $request)
    {
        $this->authorize('create', new Category());

        $this->categories->store(array_merge([
            'band_id' => $request->user()->band_id,
        ], $request->validated()));

        return redirect(route('categories.index'))
            ->withSuccess(__('categories.created'));
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Category $category)
    {
        $this->authorize('update', $category);

        return view('categories.edit', compact('category'));
    }


    /**
     * @param Category $category
     * @param CategoryUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Category $category, CategoryUpdateRequest $request)
    {
        $this->authorize('update', $category);

        $this->categories->update($category, $request->validated());

        return redirect(route('categories.index'))->withSuccess(__('categories.updated'));
    }

    /**
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Category $category)
    {
        $this->authorize('delete', $category);

        $category->delete();

        return redirect(route('categories.index'))->withSuccess(__('categories.deleted'));
    }
}
