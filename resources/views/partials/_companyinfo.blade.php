<div class="box_general company_info">
    <h3>{{ $company->name }}</h3>
    <p>{{ $company->description }}</p>
    <p><strong>Address</strong><br>{{ $company->location }}</p>
    <p><strong>Website</strong><br><a href="{{ $company->website_url }}">{{ $company->website_url }}</a></p>
    <p><strong>Email</strong><br><a >{{ $company->email }}</a></p>
    <p><strong>Telephone</strong><br>{{ $company->contact_number }}</p>
    <p class="follow_company">
        <strong>Follow Us</strong><br>
        @if($company->facebook_url !== null)
            <a href="{{ $company->facebook_url }}"><i class="social_facebook_circle"></i></a>
        @endif
        @if($company->twitter_url !== null)
            <a href="{{ $company->twitter_url }}"><i class="social_twitter_circle"></i></a>
        @endif
        @if($company->insta_url !== null)
            <a href="{{ $company->insta_url }}"><i class="social_instagram_circle"></i></a>
        @endif
    </p>
    <div class="text-right add_bottom_30"><a href="{{ route('companies.reviews',$company->slug) }}" class="btn_1 small">Read All Reviews</a></div>
</div>
