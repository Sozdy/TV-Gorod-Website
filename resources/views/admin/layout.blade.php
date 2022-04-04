<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Scripts -->
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <script>
        document.onreadystatechange = () => {
            // Filling published_at
            $("#published_at").val("{{ \Carbon\Carbon::createFromDate(old('published_at') ?? $old->published_at ?? \Carbon\Carbon::now()->format("Y-m-d\TH:i"))->format("Y-m-d\TH:i") }}")

            // Filling slug
            $("input[name=title], input[name=name]").keyup((e) => {
                $("input[name=slug]").val(transliterate(e.target.value.toLowerCase()).replace(/[^A-Za-zА-Яа-я0-9\-\s]/g,'').replace(/[^A-Za-zА-Яа-я0-9]/g,'-'));
            });

            var a = {"Ё":"Yo","Й":"I","Ц":"Ts","У":"U","К":"K","Е":"E","Н":"N","Г":"G","Ш":"Sh","Щ":"Sch","З":"Z","Х":"H","Ъ":"'","ё":"yo","й":"i","ц":"ts","у":"u","к":"k","е":"e","н":"n","г":"g","ш":"sh","щ":"sch","з":"z","х":"h","ъ":"'","Ф":"F","Ы":"I","В":"V","А":"a","П":"P","Р":"R","О":"O","Л":"L","Д":"D","Ж":"ZH","Э":"E","ф":"f","ы":"i","в":"v","а":"a","п":"p","р":"r","о":"o","л":"l","д":"d","ж":"zh","э":"e","Я":"Ya","Ч":"CH","С":"S","М":"M","И":"I","Т":"T","Ь":"'","Б":"B","Ю":"YU","я":"ya","ч":"ch","с":"s","м":"m","и":"i","т":"t","ь":"'","б":"b","ю":"yu"};

            function transliterate(word){
                // Будем! :-D // return word; // Не будем переводить в латиницу. :-)
                return word.split('').map(function (char) {
                    return a[char] || char;
                }).join("");
            }
        }

        function processRT(self) {
            var result = $(self)
                .html()
                .replaceAll("</p>", "<br>")
                .replaceAll("<br><br>", "")
                .replace(/<\/?(?!(?:b|i|u|a|br|blockquote)\b)[a-z](?:[^>"']|"[^"]*"|'[^']*')*>/gm, '');

            while ( result.endsWith("<br>")     ||
                    result.endsWith("&nbsp")    ||
                    result.endsWith("\r")       ||
                    result.endsWith("\n")       ||
                    result.endsWith("\t")       ||
                    result.endsWith(" ")
            ) {
                if (result.endsWith("<br>"))
                    result = result.substring(0, result.length - 4)
                if (result.endsWith("&nbsp;"))
                    result = result.substring(0, result.length - 6)
                if (result.endsWith("\r") || result.endsWith("\n") || result.endsWith("\t") || result.endsWith(" "))
                    result = result.substring(0, result.length - 1)
            }

            $('textarea[name=description]').val(result);

            if ($(self).html() != result) {
                console.log('"'+result+'"');
                console.log('"'+$(self).html()+'"');
                $(self).html(result);
            }
        }
    </script>
</head>
<body style="overflow-x: scroll">

<div id="app" class="admin-page">

    @include("admin.partials.navigation-menu")

    <div class="content">
        @yield('page')
    </div>

</div>

<script src="{{ mix('js/app.js') }}"></script>

</body>
</html>
