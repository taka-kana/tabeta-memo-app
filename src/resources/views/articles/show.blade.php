@extends('layouts.app')

@section('content')

<section class="show">
    <div class="container">
        <h3 class="show-title">レシピ詳細</h3>
        <div class="show-wrapper">
            <div class="show_article-name-wrapper wow fadeInDown">
                <div class="show_article-name-title">レシピ名&nbsp;:&nbsp;</div>
                <div class="show_article-name ">{{ $article->title }}</div>
            </div>
            <div class="show_article-item-wrapper wow fadeInDown">
                <div class="show_article-category-wrapper">
                    <div class="show_article-category-title">カテゴリー&nbsp;:&nbsp;</div>
                    <div class="show_article-category">{{ $article->category->name }}</div>
                </div>
                <div class="show_article-keyword-wrapper">
                    <div class="sikiri">|</div>
                    <div class="show_article-keyword-title">キーワード&nbsp;:&nbsp;</div>
                    <div class="show_article-keyword">{{ $article->keyword->name }}</div>
                </div>
            </div>
            <div class="show_article-reaction-wrapper wow fadeInDown">
                <div class="show_article-reaction-title">我が家のレビュー&nbsp;:&nbsp;</div>
                <div class="show_article-reaction">
                    @if($article->revue_id =='1')
                    <i class="far fa-grimace"></i>
                    @endif
                    @if($article->revue_id =='2')
                    <i class="far fa-smile"></i>
                    @endif
                    @if($article->revue_id =='3')
                    <i class="far fa-kiss-wink-heart"></i>
                    @endif
                    {{ $article->revue->name }}</div>
            </div>
            <div class="show_article-img-wrapper wow fadeInDown">
                <div class="show_article-img">
                    @if ( $article->image !=='')
                            <img src="{{ \Storage::url($article->image) }}">
                            @else
                            <img src="{{ \Storage::url('items/no_image.jpeg') }}">
                            @endif
                </div>
            </div>
            <div class="show_article-username-wrapper wow fadeInDown">
                <div class="show_article-username-title">投稿者&nbsp;:&nbsp;</div>
                <div class="show_article-username ">{{ $article->user->name }}</div>
            </div>
            <div class="show_article-memo-wrapper wow fadeInDown">
                <div class="show_article-memo-title">memo</div>
                <textarea class="show_article-memo" name="" id="" cols="30" rows="10">{{ $article->summary }}</textarea>
            </div>
            <div class="show_article-btn-wrapper wow fadeInDown">

                <a href="{{ route('index') }}" class="show_article-btn-back">戻る</a>
                @if ($article->user_id == Auth::id())
                <a href="{{ route('edit', ['id' => $article->id]) }}" class="show_article-btn-edit">編集</a>
                @endif

            </div>
        </div>
    </div>
</section>
@endsection