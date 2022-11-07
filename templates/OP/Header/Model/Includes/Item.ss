<% if $Links %>
    <button class="op-header__toggle-subnav">
        <span>
            $Title
            <% if $Subtitle %>
                <span>$Subtitle</span>
            <% end_if %>
        </span>
    </button>
    <ul class="<% if $Content %> has-content<% end_if %>">
        <li class="$LinkingMode">
            <a{$IDAttr}{$ClassAttr} <% if $LinkURL %>href="{$LinkURL}"<% end_if %> {$TargetAttr}>
                <strong>$Title</strong>
            </a>
        </li>
        <% loop $Links %>
            <li class="$LinkingMode" <% if $BottomMargin %>style="margin-bottom: $BottomMargin;"<% end_if %>><% include OP\Header\Model\Item Header=$Up.Header %></li>
        <% end_loop %>
        <% if $Content %>
            <li class="op-header__content">
                $Image
                <span>$Content</span>
                <span>$LinkTo</span>
                <% with $Header %>
                    <span>$Content</span>
                    <span class="op-header__social">
                        <ul>
                            <% loop $SocialMediaLinks %>
                                <li>
                                    <a{$IDAttr}{$ClassAttr} <% if $LinkURL %>href="{$LinkURL}"<% end_if %> {$TargetAttr}>
                                        <img src="$SVG.URL" alt="$SVG.Title" />
                                    </a>
                                </li>
                            <% end_loop %>
                        </ul>
                    </span>
                <% end_with %>
            </li>
        <% end_if %>
    </ul>
<% else %>
    <a{$IDAttr}{$ClassAttr} <% if $LinkURL %>href="{$LinkURL}"<% end_if %> {$TargetAttr}>
        <% if $Bold %>
            <strong>$Title</strong>
        <% else %>
            <span>
                $Title
                <% if $Subtitle %>
                    <span>$Subtitle</span>
                <% end_if %>
            </span>
        <% end_if %>
    </a>
<% end_if %>
