@section('title')
    Virgil | Documents
@show

@section('content')
<div class="page docs">
    <section class="container docs-get-api-key">
        <a href="/signup" class="btn-virgil btn-transparent">Get API KEY</a>
    </section>

    <section class="container choices">
        <span class="choices-section active" data-tab-show="samples">SAMPLES</span>
        <span class="choices-section" data-tab-show="api-reference">API REFERENCE</span>
    </section>

    <section class="docs container md" data-tab="samples">
    </section>

    <section class="code-tabs container hide" data-tab="api-reference">
        <div class="code-tabs-nav">
            <img class="code-tabs-dots" src="/img/docs/window-dots.png" alt="dots.." />
            <button class="code-tabs-nav-item" data-section="php">PHP</button>
            <button class="code-tabs-nav-item" data-section="c#">C#</button>
        </div>

        <div class="code-tabs-subnav">
            <button class="code-tabs-nav-item code-tabs-subnav-item" data-code-tab="encrypt">encrypt</button>
            <button class="code-tabs-nav-item code-tabs-subnav-item" data-code-tab="decrypt">decrypt</button>
        </div>

        <div class="sections">
            <div class="section" data-section="php">
                    <pre data-code-tab="encrypt">
    <code class="lang-js">var marked = require('marked');
        var markdownString = '```js\n console.log("hello"); \n```';

        // Async highlighting with pygmentize-bundled
        marked.setOptions({
        highlight: function (code, lang, callback) {
        require('pygmentize-bundled')({ lang: lang, format: 'html' }, code, function (err, result) {
        callback(err, result.toString());
        });
        }
        });

        // Using async version of marked
        marked(markdownString, function (err, content) {
        if (err) throw err;
        console.log(content);
        });

        // Synchronous highlighting with highlight.js
        marked.setOptions({
        highlight: function (code) {
        return require('highlight.js').highlightAuto(code).value;
        }
        });

        console.log(marked(markdownString));
    </code>
                    </pre>
                    <pre data-code-tab="decrypt">
                        php decrypt
                    </pre>
            </div>

            <div class="section" data-section="c#">
                    <pre data-code-tab="encrypt">
                        c# encrypt
                    </pre>
                    <pre data-code-tab="decrypt">
                        c# decrypt
                    </pre>
            </div>
        </div>
    </section>
</div>
@stop
