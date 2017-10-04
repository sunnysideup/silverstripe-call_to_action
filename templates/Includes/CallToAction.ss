<% if $HasCallToAction %>
    <% with $CallToAction %>
    <figure class="large-image {$ImageFocusPoint}-position" id="large-image">
        <style scoped>
        #large-image {
            height: 1200px;
            background-image: url('$Image.Link');
            background-position: $BackgroundPosition;
        }
        #large-image h1,
        #large-image p {
             color: $FontColour;
        }
        @media (-webkit-min-device-pixel-ratio: 1.5), (min-resolution: 144dpi){
            #large-image {background-image: url('$Image.Link');}
        }
        </style>
        <figcaption class="$FontColour">
            <% if Title %><h1><strong>$Title</strong></h1><% end_if %>
            <br />
            <% if Text %><span><strong>$Text</strong></span><% end_if %>
        </figcaption>

        <% if $CallToAction %>
            <% if $Link %>
                <a href="$Link.Link" class="button do-not-bubble">$CallToAction</a>
            <% else %>
                <a href="#page-holder" class="button">$CallToAction</a>
            <% end_if %>
        <% end_if %>
    </figure>
    <% end_with %>
<% else %>
<div class="empty-space">&nbsp;</div>
<% end_if %>
