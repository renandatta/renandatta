<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\ClientRepository;
use App\Repositories\PostRepository;
use App\Repositories\ProfileRepository;
use App\Repositories\ServiceRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $profile, $service, $category, $post, $client;
    public function __construct(ProfileRepository $profile,
                                ServiceRepository $service,
                                CategoryRepository $category,
                                PostRepository $post,
                                ClientRepository $client)
    {
        $this->profile = $profile;
        $this->service = $service;
        $this->category = $category;
        $this->post = $post;
        $this->client = $client;
    }

    public function index()
    {
        $favicon = $this->profile->find('Favicon', 'name')->content;
        $logo = $this->profile->find('Logo', 'name')->content;
        $app_name = $this->profile->find('App Name', 'name')->content;
        $app_description = $this->profile->find('App Description', 'name')->content;
        $instagram = $this->profile->find('Instagram', 'name')->content;
        $twitter = $this->profile->find('Twitter', 'name')->content;
        $github = $this->profile->find('Github', 'name')->content;
        $copyright = $this->profile->find('Copyrights', 'name')->content;
        $foto = $this->profile->find('Foto', 'name')->content;
        $services = $this->service->search(new Request());
        $service_colors = array('#6C6CE5', '#F9D74C', '#F97B8B');
        foreach ($services as $key => $service) {
            $services[$key]->color = $service_colors[$key];
        }
        $category = $this->category->find('Portofolio', 'name');
        $tags = $this->get_all_tags($category->id);
        $portofolio = $this->post->search(new Request(['category_id' => $category->id]));
        return view('home.index', compact(
            'favicon', 'logo', 'app_name', 'app_description', 'instagram',
            'twitter', 'github', 'copyright', 'foto', 'services', 'portofolio', 'tags'
        ));
    }

    public function get_all_tags($category_id)
    {
        $tags = $this->post->search(new Request(['category_id' => $category_id]))
            ->pluck('tags')->toArray();
        $result = array();
        foreach ($tags as $tag)
            foreach (explode(',', $tag) as $item)
                if (!in_array($item, $result)) array_push($result, $item);
        return $result;
    }
}
