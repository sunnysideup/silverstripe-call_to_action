<% if $LargeImage %>
<figure class="large-image">
    <style scoped>
    .large-image {background-image: url('$LargeImage.Link');}
    @media (-webkit-min-device-pixel-ratio: 1.5), (min-resolution: 144dpi){
        .large-image {background-image: url('$LargeImage.Link');}
    }
    </style>
    <% if LargeText %>
    <figcaption>
        $LargeText
    </figcaption>
    <% end_if %>

    <% if $CallToActionLink %>
        <a href="$CallToActionLink.Link" class="button">$CallToAction</a>
    <% else %>
        <% if $CallToAction %><a href="#MainDetails" class="button">$CallToAction</a><% end_if %>
    <% end_if %>
</figure>
<% else %>
<div class="empty-space">&nbsp;</div>
<% end_if %>
