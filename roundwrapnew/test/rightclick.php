<pre class="brush: js hljs javascript"><span class="hljs-function"><span class="hljs-keyword">function</span> <span class="hljs-title">ConvertFormToJSON</span>(<span class="hljs-params">form</span>)</span>{
    <span class="hljs-keyword">var</span> array = jQuery(form).serializeArray();
    <span class="hljs-keyword">var</span> json = {};
    
    jQuery.each(array, <span class="hljs-function"><span class="hljs-keyword">function</span>(<span class="hljs-params"></span>) </span>{
        json[<span class="hljs-keyword">this</span>.name] = <span class="hljs-keyword">this</span>.value || <span class="hljs-string">''</span>;
    });
    
    <span class="hljs-keyword">return</span> json;
}
</pre>