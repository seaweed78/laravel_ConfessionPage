@extends('layouts.app')

@section('content')

    <style>
    .bg-second-color {
        background-color: grey;
    }

    #left-list {
        margin-left: 20px;

    }

    #left-list a {
        text-decoration: none;
        padding: 5px;
        color: #000;
        font-size: 13px;
        margin-bottom: 5px;
    }

    #left-list img {
        width: 20px;
        height: 20px;
        border-radius: 5px;
    }

    .profile {
        width: 25px;
        height: 25px;
        border-radius: 5px;
    }

    .border-gray {
        border-style: solid;
        border-color: rgb(221, 221, 221);
        border-width: 1px;

    }

    .text-gray-dark {
        color: rgb(177, 177, 177);
    }

    .hover-dark:hover {
        background-color: rgb(233, 233, 233);
        border-radius: 5px;
    }

    .post-profile {
        width: 55px;
        height: 55px;
        padding: 7px;
    }

    .left-btn {
        border-bottom-left-radius: 12px;
        border-top-left-radius: 12px;
    }

    .right-btn {
        border-bottom-right-radius: 12px;
        border-top-right-radius: 12px;
    }
    textarea{
        resize:none;
    }
    input[type="file"]{
        display:none;
    }

    .chooseimg{
        color:white;
        height:30px;
        width:100px;
        background-color:gray;
        font-size:10px;
        display:flex;
        justify-content:center;
        align-items:center;
      

    }
    .chooseimg:hover{
        cursor:pointer;
    }

    .post-image{
        display:grid;
        grid-template-columns:auto auto;
        /* grid-template-rows: repeat(1, 1fr); */
    }
    </style>



    <div class="bg-light pt-4">
        <div class="container mb-5">
            <div class="row">
                <div id="left-list" class="col-2 d-flex flex-column">
                    <a href="" class="bg-second-color">
                        <span class="rounded">+</span>
                        <span>Create Group</span>
                    </a>

                    <a href="#">
                        <span class="position-relative me-auto">
                            <img src="{{asset('images/review6.png')}}" alt="">
                            <span
                                class="position-absolute top-0 start-50 translate-middle ms-2 p-1 bg-danger border border-light rounded-circle">

                                <span class="visually-hidden">New alerts</span>
                            </span>
                        </span>
                        <span>Group 1</span>
                    </a>
                    <a href="">
                        <img src="{{asset('images/review6.png')}}" alt="">
                        <span>Group 2</span>
                    </a>
                    <a href="">
                        <img src="{{asset('images/review6.png')}}" alt="">
                        <span>Group 2</span>
                    </a>
                    <a href="">
                        <img src="{{asset('images/review6.png')}}" alt="">
                        <span>Group 2</span>
                    </a>
                </div>
                <!-- //middle part -->
                <div class="col-7">
                    <!-- USER POST -->
                    <div class="new border border-gray">
                        <form action="{{route('usersavePost')}}" method="post" enctype="multipart/form-data">
                            @csrf
                           
                                <div class="row">
                                    <div class="col">
                                        <img src="{{asset('images/review6.png')}}" class="profile rounded-circle" alt="">
                                        <label for="Post">Do
                                            you want to share something ?</label>
                                        <input type="text" style="min-width:90%"
                                            class="  m-3 border-black text-black-dark rounded-pill bg-light ps-2 text-start"
                                            placeholder="Title" name="postTitle"> 
                                            
                                        <textarea style="min-width:90%"
                                            class="  m-3 border-black text-black-dark bg-light ps-2 text-start"
                                            placeholder="Enter Text" name="post" rows="10" cols="30"> </textarea>
                                        <input type="hidden" value="{{ auth()->user()->id}}" name="user_id">
                                    </div>
                                </div>
                                <div class="post-img ps-3">
                                    <input type="file" name="file[]" id="file" multiple>
                                    
                                    <label for="file" class="chooseimg me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
  <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
  <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z"/>
</svg>Choose a Picture</label>
                                </div>
                                <div class="row text-gray-darker pt-4 pb-2 ps-3 pe-4 ">
                                    <div class="col text-center">
                                      
                                        <button type="submit" class="border border-none w-100 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                            <path
                                                d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                        </svg>Post</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                    <!-- POSTS -->
                    <div class="posts">
                        @foreach($posts as $post)
                        @if($post['user_id'] == auth()->user()->id)
                        <a href="{{url('user/display/post/'.$post->id)}}">
                        <div class="post bg-white border-gray mt-4">
                            <div class=" pt-2 d-flex justify-content-between">
                                <div class="d-flex">
                                    <img src="{{asset('images/review6.png')}}" class="post-profile rounded-circle" alt="">
                                    <div class="d-flex-column">
                                      <span class="fw-bold fs-6">{{auth()->user()->name}}</span>

                                    </div>
                                </div>
                                <div class="p-2 text-gray-darker" >
                                    <a href="{{route('userdeletePost',$post['id'])}}">

                                        <button class="btn rounded-circle  p-1" >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" class="bi bi-x" viewBox="0 0 14 14">
                                            <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </button>
                                </a>
                                </div>
                            </div>
                            <div class="post-body pt-2 ps-3">
                                <div class="post-title fw-bold">
                                    <a href="" class="text-decoration-none text-black">
                                        {{$post['title']}}
                                    </a>
                                </div>
                                <div class="post-text pt-1">
                                    {{$post['post']}}
                                </div>
                            </div>
                            @if(!empty($post['img']))
                            <div class="post-image pt-2 " >
                                @php
                                $images=explode('|',$post['img'])
                                @endphp
                                
                                @foreach($images as $image)
                                 

                                       
                                    
                                        <img src="{{url($image)}}" class="img-fluid w-100 h-100" alt="" style="object-fit:cover;" >

                                  
                                                          
                                 
                                    @endforeach
                              
                            </div>
                            @endif
                           
                            <div class="post-footer pt-3 py-4 d-flex align-items-center">
                                <div class="btn-group ps-2 " role="group">
                                    <button type="button"
                                        class="left-btn post-btn bg-secondary-color border-0 text-black p-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
                                        </svg>123454
                                    </button>
                                    <button type="button"
                                        class="right-btn post-btn bg-secondary-color border-0 me-2 text-black p-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
                                    </svg>124323
                                    </button>
                                    <button type="button"
                                        class=" post-btn bg-secondary-color rounded-pill border-0 ms-2 text-black p-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-reply-fill" viewBox="0 0 16 16">
                                    <path d="M5.921 11.9 1.353 8.62a.719.719 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z"/>
                                    </svg>20
                                    </button>
                                </div>
                            </div>
                        </div>
                        </a>
                        @endif
                        @endforeach
                    </div>
                </div>

                <!-- RIGHT SECTION -->
            <div class="col">
          <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between">
              <div class="ps-2 lh-1">
                <div class="fw-bold">Group to follow</div>
              </div>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <div class="">
                <img src="review6.png" height="20" width="20" class="rounded" alt="" srcset="">
              </div>
              <div class="ps-2 lh-1">
                <div class="fw-bold">Confession</div>
                <div class="text-secondary fw-light"><small> Lorem ipsum dolor sit amet........</small></div>
              </div>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <div class="">
                <img src="review6.png" height="20" width="20" class="rounded" alt="" srcset="">
              </div>
              <div class="ps-2 lh-1">
                <div class="fw-bold">Confession</div>
                <div class="text-secondary fw-light"><small> Lorem ipsum dolor sit amet........</small></div>
              </div>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <div class="">
                <img src="review6.png" height="20" width="20" class="rounded" alt="" srcset="">
              </div>
                <div class="ps-2 lh-1">
                            <div class="fw-bold">Confession</div>
                            <div class="text-secondary fw-light"><small> Lorem ipsum dolor sit amet........</small></div>
                            </div>
                        </li>
                    </ul>
                 </div>
            </div>
      </div>

  </div>


@endsection