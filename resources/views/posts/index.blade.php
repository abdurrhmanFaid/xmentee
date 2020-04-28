@extends('layouts.app')

@section('title')
    {{__('posts.posts', ['band' => $band->name])}}
@endsection

@section('pageTitle')
    @if(request()->has('by'))
        {{__('posts.user_posts', ['username' => request('by')])}}
    @else
        {{__('posts.posts', ['band' => $band->name])}}
    @endif
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('posts.index', $band) }}
@endsection

@section('content')
    <div class="container">
        <post-index-page inline-template :categories="{{$categories}}" v-cloak>
            <div class="row">
                <div class="col-md-8" :class="loading ? 'text-center' : ''">
                    <template v-if="!loading">
                        <template v-if="posts.length">
                            <div class="card" v-for="post in posts" :key="post.id">
                                <div class="card-body">
                                    <h4 class="header-title">
                                        <a :href="'/posts/' + post.slug" v-text="post.title"></a>
                                        <span class="text-muted d-block float-right" style="font-size: 12px" v-text="post.created_at"></span>
                                    </h4>
                                    <p class="text-muted" v-text="post.body"></p>
                                    <p>
                                        <span class="badge badge-secondary"><i class="fa fa-list"></i> @{{ post.category.name }}</span>
                                        <span class="badge badge-danger"><i class="fa fa-tag"></i> @{{ trans('posts.types.' + post.type) }}</span>
                                    </p>
                                    <img :src="post.owner.formattedImage" class="rounded-circle">
                                    <a :href="'/profile/' + post.owner.username">
                                        <span class="badge badge-md badge-soft-primary">
                                            <i class="fa fa-dot-circle"></i> @{{ post.owner.points }}
                                        </span>
                                        <span class="d-block">@{{ post.owner.name }}</span>
                                        <span class="text-muted">@{{ post.owner.formattedUsername }}</span>
                                    </a>
                                </div>
                            </div>
                            <paginator :data="data" @changed="fetch"></paginator>
                        </template>
                        <template v-else>
                            <div class="alert alert-warning">{{__('posts.empty')}}</div>
                        </template>
                    </template>
                    <template v-else>
                        <loader></loader>
                    </template>
                </div>
                <div class="col-md-4 mt-30">
                    <form method="GET" action="{{route('posts.index')}}">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">{{__('categories.categories', ['band' => $band->name])}}</h5>
                            </div>
                            <div class="card-body">
                                <div class="custom-control custom-checkbox" v-for="category in categories" :key="category.id">
                                    <input type="checkbox" :checked="queries.categories.includes((category.id).toString())" class="custom-control-input" :id="category.id" data-parsley-multiple="groups" data-parsley-mincheck="2" @click="addCategoryScope(category.id)">
                                    <label class="custom-control-label" :for="category.id">@{{ category.name }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">{{__('posts.filter_by_types')}}</h5>
                            </div>
                            <div class="card-body">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" :checked="queries.types.includes('question')" class="custom-control-input" id="type1" data-parsley-multiple="groups" data-parsley-mincheck="2" @click="addTypeScope('question')">
                                    <label class="custom-control-label" for="type1">{{__('posts.types.question')}}</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" :checked="queries.types.includes('information')" class="custom-control-input" id="type2" data-parsley-multiple="groups" data-parsley-mincheck="2" @click="addTypeScope('information')">
                                    <label class="custom-control-label" for="type2">{{__('posts.types.information')}}</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" :checked="queries.types.includes('advice')" class="custom-control-input" id="type3" data-parsley-multiple="groups" data-parsley-mincheck="2" @click="addTypeScope('advice')">
                                    <label class="custom-control-label" for="type3">{{__('posts.types.advice')}}</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" :checked="queries.types.includes('other')" class="custom-control-input" id="type4" data-parsley-multiple="groups" data-parsley-mincheck="2" @click="addTypeScope('other')">
                                    <label class="custom-control-label" for="type4">{{__('posts.types.other')}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">{{__('posts.other_filters')}}</h5>
                            </div>
                            <div class="card-body">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" :checked="queries.latest" class="custom-control-input" id="latest" data-parsley-multiple="groups" data-parsley-mincheck="2" v-model="queries.latest">
                                    <label class="custom-control-label" for="latest">{{__('posts.latest')}}</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="unanswered" data-parsley-multiple="groups" data-parsley-mincheck="2" v-model="queries.unanswered">
                                    <label class="custom-control-label" for="unanswered">{{__('posts.unanswered')}}</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" @if(request('by') == auth()->user()->username) checked @endif class="custom-control-input" id="me" data-parsley-multiple="groups" data-parsley-mincheck="2" @click="byMe">
                                    <label class="custom-control-label" for="me">{{__('posts.me')}}</label>
                                </div>
                            </div>
                        </div>
                            <button class="btn btn-dark waves-effect waves-light btn-block" v-show="!loading" @click.prevent="fetch">
                                <i class="fa fa-filter"></i> {{__('default.filter')}}
                            </button>
                    </form>
                </div>
            </div>
        </post-index-page>
    </div>
@endsection
