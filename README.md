# isca_wp-content_themes
Repo of WordPress themes folder for the ISCA website

## How to Use GIT Meeting: Nov 7, 2021 at 10am: https://etsu.zoom.us/j/96089263480?pwd=bFhNWTMyNzJFSkRtZFhuR2Y3aXFuUT09

## ISCA To Do by Nov. 15 demo:
* How to flow content upload + approval to publish. Includes Users updating their own page, it needs to be approved = Josh
(Get Meta Spreadsheet 90% done and pass to Dr. Pfeifer.)[https://onedrive.live.com/view.aspx?cid=6562c203ce13bfb4&page=view&resid=6562C203CE13BFB4!15994&parId=6562C203CE13BFB4!15993&authkey=!AGpwz-OEUEgpFvY&app=Excel] = Matthias & Kevin
* Get Meta for videos, standarize them = Tobi, Abdul, Cody, Matthias
* Someone add Categories & Tags = Tobi, Abdul, Matthias
* Outputting Meta into Short Code or Widget = Kevin
* Wireframing into template = Kate, Maggie, Kaylah
* Setup STAGING server if there's time, if not could demo from someone's local host. = Phil / Kevin
* Excel bulk import for existing data = Daniel (after meta output is established by Kevin)
* Wiki in this repo for major decision = Josh
* Moving User Roles into a Plugin so it's theme independent = Josh & Nathan
* Dr. Pheifer to file necessary paperwork to open Staging Server to everyone, not just ETSU network, Kevin to nudge Trey to make quicker
* Ask Client about Paid Plugins

## Crucial Links:
* Using GIT / Setup Your local Webserver
  - GitHub Repo: https://github.com/BillyHilly/isca_wp-content/ (you are here)
  - Sample Starter Database: https://etsu365.sharepoint.com/sites/CSCI5710-InternationalStorytellingCenterproject/Shared%20Documents/General/starterDB-iscarchives.WordPress.2021-11-03-2.xml.zip
* Coordinated META across Audio Files / WordPress / Schema.org: https://onedrive.live.com/view.aspx?cid=6562c203ce13bfb4&page=view&resid=6562C203CE13BFB4!15994&parId=6562C203CE13BFB4!15993&authkey=!AGpwz-OEUEgpFvY&app=Excel
* <a href="https://teams.microsoft.com/l/channel/19%3aep2tu7hY9fIZNsMZyoU7ve8RWi_SpcmLeco2yNoMqHI1%40thread.tacv2/General?groupId=b9dad531-7a3a-4b4f-b0c0-7e42f96b1dba&tenantId=962441d5-5055-4349-bad3-baec43c3d741">Microsoft Teams</a>
* <a href="https://etsu365.sharepoint.com/sites/CSCI5710-InternationalStorytellingCenterproject/Shared%20Documents/Forms/AllItems.aspx?RootFolder=%2Fsites%2FCSCI5710%2DInternationalStorytellingCenterproject%2FShared%20Documents%2FGeneral&FolderCTID=0x0120002C2A5DA3B40AD645AE234CF961665A3B">SharePoint Fold</a>: location of all the current files for the ISC project.

## Major Decisions

### ISC WordPress Architecture
WordPress has a tone on functionality built into its framework. After deeply evaluating this framework, we have found that there is no need for extra tables (for now) in the database. All the meta that is going to be used with the ISC project will be stored in the isca_postmeta table. Our finds also illuminated that WordPress would allow users to define custom meta fields if the functionality is enabled. And what functionality for adding metadata to performers, posts, and media there is a plugin that can do so with relative ease. 

As for adding new user roles, there needs to be a custom plugin developed with minimum work. It is important that adding the user roles be developed via plugin because if the roles are administered in child theme development, there are major coupling issues for later WordPress and theme versions. 
