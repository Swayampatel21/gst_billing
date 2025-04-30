<?php

   namespace App\Models;

   use Illuminate\Database\Eloquent\Factories\HasFactory;
   use Illuminate\Database\Eloquent\Model;

   class FailedEmail extends Model
   {
       use HasFactory;

       protected $table = 'failed_emails';

       protected $fillable = [
           'gst_bill_id',
           'email',
           'error_message',
       ];
   }