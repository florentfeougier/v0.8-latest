<div class="row">
    <div class="col-12 mb-2 text-center">
        {!! HTML::icon_link(route('social.redirect',['provider' => 'facebook']), 'fa fa-facebook', '', array('class' => 'btn btn-social-icon btn-lg mb-1 btn-facebook')) !!}
        {!! HTML::icon_link(route('social.redirect',['provider' => 'google']), 'fa fa-google-plus', '', array('class' => 'btn btn-social-icon btn-lg mb-1 btn-google')) !!}
        {!! HTML::icon_link(route('social.redirect',['provider' => 'youtube']), 'fa fa-youtube', '', array('class' => 'btn btn-social-icon btn-lg mb-1 btn-youtube')) !!}
        {!! HTML::icon_link(route('social.redirect',['provider' => 'instagram']), 'fa fa-instagram', '', array('class' => 'btn btn-social-icon btn-lg mb-1 btn-instagram')) !!}
    </div>
</div>
