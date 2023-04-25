<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMailRequest;
use App\Http\Requests\UpdateMailRequest;
use App\Repositories\MailRepository;
use App\Services\CirculationService;
use Flash;
use Illuminate\Http\Request;

class CirculationController extends AppBaseController
{
    /** @var MailRepository $mailRepository*/
    private $mailRepository;

    private $circulationService;

    public function __construct(MailRepository $mailRepo, CirculationService $circulationService)
    {
        $this->mailRepository = $mailRepo;
        $this->circulationService = $circulationService;
    }


    /**
     * Show the specified Mail to record it in register.
     */
    public function recordInRegister($id)
    {
        $mail = $this->mailRepository->find($id);

        if (empty($mail)) {
            Flash::error(__('models/mails.singular').' '.__('messages.not_found'));

            return redirect(route('mails.index'));
        }

        return view('circulation.record.form')->with('mail', $mail);
    }
    /**
     * Record specified Mail to  register.
     */
    public function storeRecorded($id, Request $request)
    {
        $mail = $this->mailRepository->find($id);

        if (empty($mail)) {
            Flash::error(__('models/mails.singular').' '.__('messages.not_found'));

            return redirect(route('mails.index'));
        }

        $this->circulationService->storeRecorded($mail, $request);

        Flash::success(__('messages.updated', ['model' => __('models/mails.singular')]));

        return redirect(route('mails.index'));
    }




    /**
     * Show the specified Mail to send it to its distinction.
     */
    public function send($id)
    {

        $mail = $this->mailRepository->find($id);

        if (empty($mail)) {
            Flash::error(__('models/mails.singular').' '.__('messages.not_found'));

            return redirect(route('mails.index'));
        }

        return view('circulation.send.form')->with('mail', $mail);
    }

    /**
     * Store sent  Mail  to its distinction.
     */
    public function storeSended($id, Request $request)
    {
        // find mail
        $mail = $this->mailRepository->find($id);
        if (empty($mail)) {
            Flash::error(__('models/mails.singular').' '.__('messages.not_found'));

            return redirect(route('mails.index'));
        }

        $this->circulationService->send($mail, $request);
        // send mail to Circulation service for save it with the request.

        Flash::success(__('messages.updated', ['model' => __('models/mails.singular')]));

        return redirect(route('mails.index'));

    }


    /**
     * Show the specified Mail for officer processing .
     */
    public function processing($id)
    {
        $mail = $this->mailRepository->find($id);

        if (empty($mail)) {
            Flash::error(__('models/mails.singular').' '.__('messages.not_found'));

            return redirect(route('mails.index'));
        }

        return view('circulation.process.form')->with('mail', $mail);
    }

    /**
     * store Processing action by the Manager
     * @param $id
     * @return void
     */
    public function storeProcessing($id, Request $request)
    {
        // find mail
        $mail = $this->mailRepository->find($id);
        if (empty($mail)) {
            Flash::error(__('models/mails.singular').' '.__('messages.not_found'));

            return redirect(route('mails.index'));
        }

        $mail = $this->circulationService->storeProcessing($mail, $request);


        Flash::success(__('messages.updated', ['model' => __('models/mails.singular')]));

        return redirect(route('mails.index'));
    }

}
