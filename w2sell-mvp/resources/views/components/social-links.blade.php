<div class="elements-social social-icon-style-10">
    <ul class="small-icon dark fw-600">
        <li class="fs-18">Follow us
            <span class="separator-line-1px w-30px bg-dark-gray d-inline-block align-middle ms-15px"></span>
        </li>
        @foreach ($links as $key => $link)
            <li><a class="{{ $key }}" href="{{ $link['url'] }}" target="_blank">{{ $link['label'] }}</a></li>
        @endforeach
    </ul>
</div>
