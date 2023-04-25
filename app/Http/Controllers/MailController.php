<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMailRequest;
use App\Http\Requests\UpdateMailRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\MailRepository;
use Illuminate\Http\Request;
use Flash;

class MailController extends AppBaseController
{
    /** @var MailRepository $mailRepository*/
    private $mailRepository;

    public function __construct(MailRepository $mailRepo)
    {
        $this->mailRepository = $mailRepo;
    }

    /**
     * Display a listing of the Mail.
     */
    public function index(Request $request)
    {
        return view('mails.index');
    }

    /**
     * Show the form for creating a new Mail.
     */
    public function create()
    {
        return view('mails.create');
    }

    /**
     * Store a newly created Mail in storage.
     */
    public function store(CreateMailRequest $request)
    {
        $input = $request->all();

        $mail = $this->mailRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/mails.singular')]));

        return redirect(route('mails.index'));
    }

    /**
     * Display the specified Mail.
     */
    public function show($id)
    {
        $mail = $this->mailRepository->find($id);

        if (empty($mail)) {
            Flash::error(__('models/mails.singular').' '.__('messages.not_found'));

            return redirect(route('mails.index'));
        }

        return view('mails.show')->with('mail', $mail);
    }

    /**
     * Show the form for editing the specified Mail.
     */
    public function edit($id)
    {
        $mail = $this->mailRepository->find($id);

        if (empty($mail)) {
            Flash::error(__('models/mails.singular').' '.__('messages.not_found'));

            return redirect(route('mails.index'));
        }

        return view('mails.edit')->with('mail', $mail);
    }

    /**
     * Update the specified Mail in storage.
     */
    public function update($id, UpdateMailRequest $request)
    {
        $mail = $this->mailRepository->find($id);

        if (empty($mail)) {
            Flash::error(__('models/mails.singular').' '.__('messages.not_found'));

            return redirect(route('mails.index'));
        }

        $mail = $this->mailRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/mails.singular')]));

        return redirect(route('mails.index'));
    }

    /**
     * Remove the specified Mail from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $mail = $this->mailRepository->find($id);

        if (empty($mail)) {
            Flash::error(__('models/mails.singular').' '.__('messages.not_found'));

            return redirect(route('mails.index'));
        }

        $this->mailRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/mails.singular')]));

        return redirect(route('mails.index'));
    }
}
