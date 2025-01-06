<?php

namespace App\Services\FrontSites;

use App\Repositories\BlogRepository;
use App\Repositories\SlideRepository;
use App\Repositories\DealRepository;

class HomeService {

    protected $blogRepository;
    protected $slideRepository;
    protected $dealRepository;

    public function __construct(BlogRepository $blogRepository, SlideRepository $slideRepository, DealRepository $dealRepository) {
    
        $this->blogRepository = $blogRepository;
        $this->slideRepository = $slideRepository;
        $this->dealRepository= $dealRepository;

    }

    public function handleHomeBlog($limit,$where)
    {
        return $this->blogRepository->getByLimitByWhere($limit,$where);
    }

    public function handleHomeSlide($limit)
    {
        return $this->slideRepository->getByLimit($limit);
    }

    public function handleHomeDeal($limit)
    {
        return $this->dealRepository->getByLimit($limit);
    }
}
