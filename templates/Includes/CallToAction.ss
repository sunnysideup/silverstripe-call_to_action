<% if $CallToAction %>
    <% with $CallToAction %>
    <figure class="large-image">
        <style scoped>
        .large-image {
            background-image: url('$LargeImage.Link');
            background-position: $BackgroundPosition;
        }
        h1, p {
             color: $LargeTextFontColour!important
        }
        @media (-webkit-min-device-pixel-ratio: 1.5), (min-resolution: 144dpi){
            .large-image {background-image: url('$LargeImage.Link');}
        }
        </style>
        <% if LargeText %>
        <figcaption>
            <h1>$LargeTextTitle</h1>
            <p>$LargeText</p>
        </figcaption>
        <% end_if %>

        <% if $CallToActionLink %>
            <a href="$CallToActionLink.Link" class="button">$CallToAction</a>
        <% else %>
            <% if $CallToAction %><a href="#MainDetails" class="button">$CallToAction</a><% end_if %>
        <% end_if %>
    </figure>
    <% end_with %>
<% else %>
<div class="empty-space">&nbsp;</div>
<% end_if %>
