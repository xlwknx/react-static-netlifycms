<?php

return "
[header_nav_open]
    [header_nav_item slug=homepage class=headerNav-home label='Home']
    [header_nav_item_open type=a class=headerNav-documentation label='Developers']
        [header_nav_item level=second icon=book link='https://developer.virgilsecurity.com/docs' label=Documentation]
        [header_nav_item_open level=second type=caption label='Get started']
            [header_nav_item level=third link='https://developer.virgilsecurity.com/docs/get-started/encrypted-communication' label='Encrypted communication']
            [header_nav_item level=third link='https://developer.virgilsecurity.com/docs/get-started/encrypted-storage' label='Encrypted storage']
            [header_nav_item level=third link='https://developer.virgilsecurity.com/docs/get-started/passwordless-authentication' label='Passwordless Authentication']
            [header_nav_item level=third link='https://developer.virgilsecurity.com/docs/get-started/data-integrity' label='Data Integrity']
        [header_nav_item_close]
        [header_nav_item level=second icon=bookmark link='https://developer.virgilsecurity.com/docs/references' label='API references']
    [header_nav_item_close]

    [header_nav_item_open class=headerNav-about label='Company']
        [header_nav_item level=second icon=shield slug=about-virgil label='About Virgil']
        <!--[header_nav_item level=second icon=case slug=clients label='Clients']-->
        [header_nav_item level=second icon=medium link='https://medium.com/@VirgilSecurity' label='Blog']
    [header_nav_item_close]
    [header_nav_item slug=features class=headerNav-features label='Features']
    [header_nav_item slug=pricing class=headerNav-pricing label='Pricing']
    [header_nav_item slug=contacts class=headerNav-contacts label='Contacts']
[header_nav_close]
";
