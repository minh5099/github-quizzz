<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class getMail extends Mailable
{
    use Queueable, SerializesModels;

    public $getMail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    //__construct dùng để khởi tạo các tham số đầu vào
    public function __construct($getMail)
    {
        //Khởi tạo giá trị
        $this->getMail = $getMail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    //Phương thức build dùng để tạo phương thức mes để gửi
    public function build()
    {
        return $this->text('sendMail');
    }
}
