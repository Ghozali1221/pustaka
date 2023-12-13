<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistoryLogs extends Model
{
 use HasFactory;
 protected $table = 'history_logs';
 protected $fillable = [
  'user_id',
  'book_id',
  'rent_date',
  'return_date'
 ];

 /**
  * Get the user that owns the HistoryLogs
  *
  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
  */
 public function user(): BelongsTo
 {
  return $this->belongsTo(User::class, 'user_id', 'id');
 }

 /**
  * Get the user that owns the HistoryLogs
  *
  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
  */
 public function book(): BelongsTo
 {
  return $this->belongsTo(Book::class, 'book_id', 'id');
 }
}
