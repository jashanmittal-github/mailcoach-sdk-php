<?php

use Spatie\MailcoachSdk\Mailcoach;

beforeEach(function () {
    $this->mailcoach = new Mailcoach(
        $_ENV['MAILCOACH_TOKEN'],
        $_ENV['MAILCOACH_ENDPOINT'],
    );
});

it('can test', function () {
    /*
    $this->mailcoach->createEmailList([
        'name' => 'My SDK test',
        'default_from_name' => 'Freek',
        'default_from_email' => 'freek@spatie.be',
    ]);
    */

    /* test list uid
    $uuid = '63561a40-99da-406f-81c7-202d854a4dba';

    $emailList = $this->mailcoach->emailList($uuid);

    $emailList->name = 'updated name';

    $emailList->save();

    dd($emailList, 'saved');
    */
});

it('subscribers', function () {
    $freekDevUuid = '590f564a-3f79-4981-8814-188fe39cc918';

    $subscribers = $this->mailcoach->subscribers($freekDevUuid);

    do {
        foreach($subscribers as $subscriber) {
            dump($subscriber->email);
        }
    } while($subscribers = $subscribers->next());
});

it('create subscriber', function () {
    /* test list uuid */
    $uuid = '63561a40-99da-406f-81c7-202d854a4dba';

    $subscriber = $this->mailcoach->createSubscriber($uuid, ['email' => 'freek@spatie.be']);
});

it('update subscriber', function () {
    /* test list uuid */
    $uuid = '63561a40-99da-406f-81c7-202d854a4dba';

    $subscriber = $this->mailcoach->findByEmail($uuid, 'freek@spatie.be');

    $subscriber->first_name = 'Freek';

    $subscriber->save();

    $subscriber->delete();

    dd($subscriber);
});

it('unsubscribe subscriber', function () {
    /* test list uuid */
    $uuid = '63561a40-99da-406f-81c7-202d854a4dba';

    $subscriber = $this->mailcoach->findByEmail($uuid, 'freek@spatie.be');


    $subscriber->unsubscribe();
    $subscriber->confirm();
});

it('delete subscriber', function () {
    /* test list uuid */
    $uuid = '63561a40-99da-406f-81c7-202d854a4dba';

    $subscriber = $this->mailcoach->findByEmail($uuid, 'freek@spatie.be');

    $subscriber->delete();
});
