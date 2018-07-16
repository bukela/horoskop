<?php

namespace App\Jobs;

use App\Post;
use Illuminate\Bus\Queueable;
use Intervention\Image\Facades\Image;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\DB;

class ImageEdit implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $featured_name; 
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($featured_name)
    {
        $this->featured_name = $featured_name;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $featured_name = $this->featured_name;
        $thumb = Image::make(public_path('/uploads/posts/'.$featured_name))->resize(150, 150);
        $thumb->save(public_path('/uploads/posts/thumbs/'.$featured_name, 60)); // 60-kvalitet slike
    }
}
