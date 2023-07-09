<?php

namespace App\Admin\Controllers;

use App\projectCategory;
use App\projects;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProjectsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'projects';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new projects());

        $grid->column('id', __('Id'));
        $grid->column('project_category_id', __('Project category id'));
        $grid->column('name', __('Name'));
        $grid->column('description', __('Description'));
        $grid->column('imagePath', __('ImagePath'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(projects::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('project_category_id', __('Project category id'));
        $show->field('name', __('Name'));
        $show->field('description', __('Description'));
        $show->field('imagePath', __('ImagePath'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new projects());

        $form->select('project_category_id', __('Project category id'))->options(projectCategory::all()->pluck('name', 'id'))->required();
        $form->text('name', __('Name'));
        $form->textarea('description', __('Description'));
        $form->image('imagePath', __('ImagePath'));

        return $form;
    }
}
