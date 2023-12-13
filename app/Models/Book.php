<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
 use HasFactory, Sluggable, SoftDeletes;

 protected $fillable = [
  'kode_buku',
  'judul',
  'cover',
  'slug'
 ];

 public function sluggable(): array
 {
  return [
   'slug' => [
    'source' => 'judul'
   ]
  ];
 }

 /**
  * The roles that belong to the Book
  *
  * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
  */
 public function categories(): BelongsToMany
 {
  return $this->belongsToMany(Category::class, 'pivot_book_categories', 'book_id', 'category_id');
 }
}
