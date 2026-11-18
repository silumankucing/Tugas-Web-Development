<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

/**
 * Model pesan kontak.
 *
 * Menyimpan pesan yang dikirim pengunjung melalui form pada halaman Contact.
 */
#[Fillable(['name', 'email', 'subject', 'message', 'ip_address'])]
class ContactMessage extends Model
{
    //
}
