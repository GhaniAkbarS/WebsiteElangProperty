<?php

namespace App\Services\FrontSites;

use App\Repositories\BlogRepository;
use App\Repositories\SlideRepository;

class HomeService {

    protected $blogRepository;
    protected $slideRepository;

    public function __construct(BlogRepository $blogRepository, SlideRepository $slideRepository)
    {
        $this->blogRepository = $blogRepository;
        $this->slideRepository = $blogRepository;
    }

    public function handleHomeBlog($limit,$where) {
        return $this->blogRepository->getByLimitByWhere($limit,$where);
    }

    public function handleHomeSlide($limit)
    {
        return $this->slideRepository->getByLimit($limit);
    }
}
