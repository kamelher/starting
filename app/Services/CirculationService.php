<?php

namespace App\Services;

use App\Models\Mail;
use Illuminate\Http\Request;


class CirculationService
{


    private function preparreData(array $data, $key): array
    {
        $data[$key] = json_encode($data[$key]);
        return $data;
    }

    private function createReceivers(Request $request): array
    {
        $register_id = $request->register_id;
        $tmp = [];
        $data = $request->validate([
            'receiver_id.*' => 'required',
            'sent_number' => 'required',
        ], $request->except('register_id'));

        foreach ($data['receiver_id'] as $item) {
            echo $item;
            $row[$register_id] = [
                'receiver_id' => $item,
                'sent_number' => $data['sent_number'],
                'sender_id' => \Auth::user()->service->id,
                'sent_at' => now()->toDate(),
                'arrived_at' => now()->toDate(),
            ];

            $tmp[$item] = $row;
        }
        return $tmp;
    }

    /**
     * Save the sent mail for all receivers in the Out-coming register with the same sent_number
     * @param Mail $mail
     * @param Request $request
     * @return Mail
     */
    public function send(Mail $mail, Request $request): Mail
    {
        $data = $this->createReceivers($request);

        //attach mails to register with request data
        foreach ($data as $row) $mail->registers()->attach($row);

        return $mail;
    }

    /**
     *
     * Save the record inside the receiver In-coming register
     * @param Mail $mail
     * @param Request $request
     * @return Mail
     */

    public function storeRecorded(Mail $mail, Request $request): Mail
    {
        //TODO complete the recording method

        $data = $request->validate(['register_id' => 'required',
            'record_number' => 'required',
            'reference_number' => 'required',
            'recorded_data.*' => 'required',
        ]);
        $data['recorded_at'] = now()->toDate();

        // recorded_at recorded_data record_number
        $mail->actualregister(\Auth::id())->update($data);

        return $mail;
    }


    /**
     * Save the Mail processing action
     */

    public function storeProcessing(Mail $mail, Request $request): Mail
    {

       dd($request->all());
        return $mail;
    }

}
