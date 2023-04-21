<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateActionRequest;
use App\Http\Requests\UpdateActionRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ActionRepository;
use Illuminate\Http\Request;
use Flash;

class ActionController extends AppBaseController
{
    /** @var ActionRepository $actionRepository*/
    private $actionRepository;

    public function __construct(ActionRepository $actionRepo)
    {
        $this->actionRepository = $actionRepo;
    }

    /**
     * Display a listing of the Action.
     */
    public function index(Request $request)
    {
        return view('actions.index');
    }

    /**
     * Show the form for creating a new Action.
     */
    public function create()
    {
        return view('actions.create');
    }

    /**
     * Store a newly created Action in storage.
     */
    public function store(CreateActionRequest $request)
    {
        $input = $request->all();

        $action = $this->actionRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/actions.singular')]));

        return redirect(route('actions.index'));
    }

    /**
     * Display the specified Action.
     */
    public function show($id)
    {
        $action = $this->actionRepository->find($id);

        if (empty($action)) {
            Flash::error(__('models/actions.singular').' '.__('messages.not_found'));

            return redirect(route('actions.index'));
        }

        return view('actions.show')->with('action', $action);
    }

    /**
     * Show the form for editing the specified Action.
     */
    public function edit($id)
    {
        $action = $this->actionRepository->find($id);

        if (empty($action)) {
            Flash::error(__('models/actions.singular').' '.__('messages.not_found'));

            return redirect(route('actions.index'));
        }

        return view('actions.edit')->with('action', $action);
    }

    /**
     * Update the specified Action in storage.
     */
    public function update($id, UpdateActionRequest $request)
    {
        $action = $this->actionRepository->find($id);

        if (empty($action)) {
            Flash::error(__('models/actions.singular').' '.__('messages.not_found'));

            return redirect(route('actions.index'));
        }

        $action = $this->actionRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/actions.singular')]));

        return redirect(route('actions.index'));
    }

    /**
     * Remove the specified Action from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $action = $this->actionRepository->find($id);

        if (empty($action)) {
            Flash::error(__('models/actions.singular').' '.__('messages.not_found'));

            return redirect(route('actions.index'));
        }

        $this->actionRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/actions.singular')]));

        return redirect(route('actions.index'));
    }
}
