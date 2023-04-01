<?php

namespace App\Observers;

use App\Models\Category;
use App\Models\Log;
use App\Traits\Loggable;

class CategoryObserver
{
    use Loggable;
    public function __construct() {
        $this->model = Category::class;
    }

    /**
     * Handle the Category "created" event.
     */
    public function created(Category $category): void
    {
        $this->log("create", $category->id, $category->toArray(), $this->model);
    }

    /**
     * Handle the Category "updated" event.
     */
    public function updated(Category $category): void
    {
        $this->updateLog($category, $this->model);
    }

    /**
     * Handle the Category "deleted" event.
     */
    public function deleted(Category $category): void
    {
        $this->log("delete", $category->id, $category->toArray(), $this->model);
    }

    /**
     * Handle the Category "restored" event.
     */
    public function restored(Category $category): void
    {
        $this->log("restore", $category->id, $category->toArray(), $this->model);
    }

    /**
     * Handle the Category "force deleted" event.
     */
    public function forceDeleted(Category $category): void
    {
        $this->log("force delete", $category->id, $category->toArray(), $this->model);
    }
}
