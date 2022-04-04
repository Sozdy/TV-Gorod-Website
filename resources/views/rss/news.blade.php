<?xml version="1.0" encoding="utf-8"?>
<rss
    xmlns:yandex="http://news.yandex.ru"
    xmlns:media="http://search.yahoo.com/mrss/"
    xmlns:rambler="http://news.rambler.ru"
    xmlns:content="http://purl.org/rss/1.0/modules/content/"
    version="2.0">
    <channel>
        <title>Информационное агентство «Город»</title>
        <link>https://xn--b1acd3balk.xn--p1ai/</link>
        <description>Информагентство, миссией которой является оперативное, взвешенное и объективное освещение событий в
            городе Благовещенске и Амурской области</description>
        <language>ru</language>
        <lastBuildDate>{{ \Carbon\Carbon::now()->format('D, d M Y H:i:s') }} +0900</lastBuildDate>
        <ttl>60</ttl>
        <yandex:logo>https://твгород.рф/img/logo.png</yandex:logo>
        <yandex:logo type="square">https://твгород.рф/img/logo_square.png</yandex:logo>
        @foreach(\App\Models\News
            ::where('export_news', true)
            ->whereAnd("published_at", "<=", \Carbon\Carbon::now())
            ->orderBy("published_at", "desc")->limit(15)->get() as $news)
        <item>
            <title>{{ $news->title }}</title>
            <link>https://твгород.рф/news/{{ $news->slug }}/</link>
            <pdalink>https://твгород.рф/news/{{ $news->slug }}/</pdalink>
            <guid isPermaLink="true">https://твгород.рф/news/{{ $news->slug }}/</guid>
            <description>{{ $news->short_description }}</description>
            <author>{{ $news->text_author }}</author>
            <category>{{ App\Models\NewsCategories::whereId($news->news_category_id ?? 1)->first()->name }}</category>
            <enclosure
                url="https://твгород.рф/img/news/{{ $news->id }}.jpg"
                type="image/jpeg"/>
            @if($news->video_link)
            <media:group>
                <media:player
                    url="https://твгород.рф/news/{{ $news->slug }}"
                    type="video/x-ms-asf"/>
                <media:thumbnail
                    url="https://твгород.рф/img/news/{{ $news->id }}.jpg"
                    type="image/jpeg"/>
                <media:content url="{{ $news->video_link }}" medium="video" type="video/3gpp">
                    <media:title>{{ $news->title }}</media:title>
                </media:content>
            </media:group>
            @endif
            <pubDate>{{ \Carbon\Carbon::createFromDate($news->published_at)->format('D, d M Y H:i:s') }} +0900</pubDate>
            <yandex:genre>{{ mb_strlen($news->description) > 1000 ? "article" : "message"}}</yandex:genre>
            <yandex:full-text>{{ $news->description }}</yandex:full-text>
            <rambler:fulltext><![CDATA[{{ $news->description }}]]></rambler:fulltext>
            <content:encoded><![CDATA[{{ $news->description }}]]></content:encoded>
        </item>
        @endforeach
    </channel>
</rss>
