<?php

return "
[header_nav_open]
    [header_nav_item_open type=a class=headerNav-documentation label='Developers']
        [header_nav_item level=second icon=book-red link='https://developer.virgilsecurity.com/docs' label=Documentation]
        [header_nav_item_open level=second type=caption label='Get started']
            [header_nav_item level=third link='https://developer.virgilsecurity.com/docs/get-started/encrypted-communication' label='Encrypted communication']
            [header_nav_item level=third link='https://developer.virgilsecurity.com/docs/get-started/encrypted-storage' label='Encrypted storage']
            [header_nav_item level=third link='https://developer.virgilsecurity.com/docs/get-started/passwordless-authentication' label='Passwordless Authentication']
            [header_nav_item level=third link='https://developer.virgilsecurity.com/docs/get-started/data-integrity' label='Data Integrity']
        [header_nav_item_close]
        [header_nav_item level=second icon=bookmark-red link='https://developer.virgilsecurity.com/docs/references' label='API references']
    [header_nav_item_close]

    [header_nav_item slug=features class=headerNav-features label='Features']
    [header_nav_item slug=pricing class=headerNav-pricing label='Pricing']
    [header_nav_item slug=blog label='Blog']
    [header_nav_item slug=contact class=headerNav-contacts label='Contacts']
[header_nav_close]
";