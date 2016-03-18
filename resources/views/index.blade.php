@extends('layouts.master')
@section('title')
    @parent
    - Trang Chủ
@stop
@section('content')
    <div class="container">
        <!--Featured Services-->
        <section class="top-services">
            <div class="auto-container">
                
                <div class="sec-title wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1000ms">
                    <h2>Best features of <span>Our theme</span></h2>
                </div>
                    
                <div class="sec-text wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1000ms">
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in<br>some form, by injected humour, or randomised words which don't look even slightly believable</p>
                </div>
                
                <div class="row clearfix">
                    
                    <!--Post-->
                    <article class="col-md-4 col-sm-6 col-xs-12 post wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1000ms">
                        <div class="post-inner">
                        
                            <figure class="image">
                                <img class="img-responsive" src="{{ url('public/user/images/resource/post-image-1.jpg')}}" alt="" />
                                <span class="curve"></span>
                            </figure>
                            <div class="content">
                                <div class="inner-box">
                                    <h3 style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;white-space: nowrap;">Get legal help</h3>
                                    <div class="text">There are many variations of  the passages of Lorem . . .</div>
                                    <a href="#" class="read_more">READ MORE</a>
                                </div>
                            </div>
                        </div>
                    </article>
                    
                    <!--Post-->
                    <article class="col-md-4 col-sm-6 col-xs-12 post wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1000ms">
                        <div class="post-inner">
                        
                            <figure class="image">
                                <img class="img-responsive" src="{{ url('public/user/images/resource/post-image-2.jpg')}}" alt="" />
                                <span class="curve"></span>
                            </figure>
                            <div class="content">
                                <div class="inner-box">
                                    <h3 style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">Expert lawyear</h3>
                                    <div class="text">There are many variations of  the passages of Lorem . . .</div>
                                    <a href="#" class="read_more">READ MORE</a>
                                </div>
                            </div>
                            
                        </div>
                    </article>
                    
                    <!--Post-->
                    <article class="col-md-4 col-sm-6 col-xs-12 post wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1000ms">
                        <div class="post-inner">
                        
                            <figure class="image">
                                <img class="img-responsive" src="{{ url('public/user/images/resource/post-image-3.jpg')}}" alt="" />
                                <span class="curve"></span>
                            </figure>
                            <div class="content">
                                <div class="inner-box">
                                    <h3 style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">Low cost</h3>
                                    <div class="text">There are many variations of  the passages of Lorem . . .</div>
                                    <a href="#" class="read_more">READ MORE</a>
                                </div>
                            </div>
                            
                        </div>
                    </article>

                    <!--Post-->
                    <article class="col-md-4 col-sm-6 col-xs-12 post wow fadeInUp" data-wow-delay="600ms" data-wow-duration="1000ms">
                        <div class="post-inner">
                        
                            <figure class="image">
                                <img class="img-responsive" src="{{ url('public/user/images/resource/post-image-3.jpg')}}" alt="" />
                                <span class="curve"></span>
                            </figure>
                            <div class="content">
                                <div class="inner-box">
                                    <h3 style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">Low cost</h3>
                                    <div class="text">There are many variations of  the passages of Lorem . . .</div>
                                    <a href="#" class="read_more">READ MORE</a>
                                </div>
                            </div>
                            
                        </div>
                    </article>

                    <!--Post-->
                    <article class="col-md-4 col-sm-6 col-xs-12 post wow fadeInUp" data-wow-delay="800ms" data-wow-duration="1000ms">
                        <div class="post-inner">
                        
                            <figure class="image">
                                <img class="img-responsive" src="{{ url('public/user/images/resource/post-image-3.jpg')}}" alt="" />
                                <span class="curve"></span>
                            </figure>
                            <div class="content">
                                <div class="inner-box">
                                    <h3 style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">Low cost</h3>
                                    <div class="text">There are many variations of  the passages of Lorem . . .</div>
                                    <a href="#" class="read_more">READ MORE</a>
                                </div>
                            </div>
                            
                        </div>
                    </article>
                    
                </div>
            </div>
        </section>
    </div>
@endsection