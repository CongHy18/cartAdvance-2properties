<?php if (isset($config['LQD']['translate']) && $config['LQD']['translate'] == true) {?>
<li>
    <div class="lang d-flex justify-content-start align-items-center">
        <img class="hvr-float mr-1" src="assets/images/vi.jpg" onclick="doGoogleLanguageTranslator('vi|vi'); return false;" />
        <img class="hvr-float" src="assets/images/en.jpg" onclick="doGoogleLanguageTranslator('vi|en'); return false;" />
    </div>
</li>
<div id="google_language_translator"></div>
<style>
    .goog-te-gadget, .skiptranslate { display: none;}
    body {top: 0px !important;}
</style>
<?php } ?>