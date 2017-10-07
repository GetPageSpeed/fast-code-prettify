# Fast Code Prettify

This super small Wordpress plugin ensures Google Prettify syntax for Jetpack Markdown & Fenced Code Blocks.

In a nutshell, it enables syntax highlighting of your Markdown code.

* Updates JetPack's Markdown fenced blocks HTML to unified format:

    ```html
    <pre class="prettyprint"><code class="language-bash">...
    ```
    From: 
    
    ```html
    <pre><code class="bash">...
    ```
    
    Or:
    
    ```html
    <pre><code>...
    ```    
    
* Includes Google Prettify from CDNJS when needed, does so with ```async``` attribute of ```script``` tag.

* Comes with no GUI for settings, very lightweight and does its thing to syntax highlight code!

## Usage notes

* JetPack fenced block Markdown is specified like this:


        ```css
        p.warning { color: red; }
        ```

* Defaults to ```bash``` when no language specified in fenced block. You can also use 4-spaces separated code blocks instead of backticks to highlight using default language.

* You must include the prettify CSS to your theme's ```style.css```. It is too small to be dynamic. Also Wordpress doesn't have native way to dynamically include CSS without affecting performance.

## Caveats

* I will not make default language as a setting. I don't want to deal with silly Wordpress options mechanism and I don't want to have any database impact. The plugin is simple for efficiency. (Goodbye bloatware plugins)


