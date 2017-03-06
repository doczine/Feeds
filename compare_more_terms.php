<?php

$query = "Rumen Telbizov

Senior Unix Systems Administrator

a: Burnaby, British Columbia, Canada
e: telbizov@gmail.com
w: http://telbizov.com
i: http://linkedin.com/in/rumentelbizov

Technical Skills
OS
Networking

Daemons

Programming

Databases
Storage

FreeBSD; Linux: Debian/Ubuntu, Gentoo, RedHat/CentOS
TCP/IP, IP Routing, BGP, RIP, Firewalls (ipfw, ipf, iptables, pf), NAT, CARP, Load balancing, Traffic shaping, Cisco
administration, HP Procurve, VLANs, STP, HTTP, SSL, SSH, DNS, RADIUS, SMTP, POP3, IMAP, FTP, TFTP, SIP, IAX2,
DHCP, NFS, SMB, SNMP, IPMI
Apache (mod_perl, mod_ssl, mod_proxy, mod_security), Nginx, MySQL, proftpd, OpenSSH, Qmail, vpopmail, Courier IMAP,
Dovecot, Exim, Asterisk PBX, HAproxy, djbdns, BIND, IceCast MP3 Streaming Server, Cacti, RRDTool, Nagios, Trac,
OpenVPN, Heartbeat, LVS, Puppet
Python + Django, C, C++, Perl/mod_perl, bash, HTML5, CSS3, JavaScript, jQuery, NodeJS, Meteor, Underscore.js,
Handlebars.js, Bootstrap, less. Forked, threaded, iterative highly efficient daemons. Sockets programming (blocking, nonblocking, libevent, gevent). Application debugging and troubleshooting on code and system level: strace, ltrace, truss, lsof,
tcpdump, netstat
MySQL (replication, query optimization), sqlite, MongoDB, MongoEngine
ZFS (FreeBSD and Linux/ZoL), NetApp, iSCSI (istgt), DRBD, MooseFS

Work Experience
Senior Unix Systems Administrator

May 2010 - May 2013

The Electric Mail Company, Burnaby, BC
Hosted email, archiving and email security

Large scale server environment with more than 500 physical servers and 400 OpenVZ VEs in 5 colo facilities, hosting over 12 million mailboxes
and serving over 1Gbit/s customer traffic
Administrated a mix of CentOS 5.x, Gentoo 32/64bit, FreeBSD 8.x and legacy OpenBSD systems as well as OpenVZ instances
Designed, documented and supervised the addition of two new colo facilities in Phoenix and Chandler, Arizona, US. Built redundant pairs or
FreeBSD routers in each data center running 10GbE network, BGP, binat and pf firewall. Implemented successful failover between the two
DataCenters and between ISPs
Implemented redundant, instant-failover, VPN tunnels between five data centers running on top of dedicated MPLS circuits and the Internet using
OpenVPN. Cut downtime related to inter-colo connectivity blips to virtually zero - a significant improvement over previous IPSec based solution
Rebuilt and migrated all routers to FreeBSD and successfully replicated functionality from OpenBSD like: pf firewall, carp failover, etc. Removed
router-related downtime due to improved stability and eliminated previous double kernel panics across the redundant pairs
Designed, documented and supervised the addition of a new colo facility in Data Electronics/Telecity in Dublin, Ireland. This included power, rack
space, network and cabling, servers configuration and purchasing, routing and redundancy
Applied and received a /22 Provider Independent IP address space from RIPE for the new Dublin colo. Implemented a redundant FreeBSD-based
pair of routers running OpenBGPd between two ISPs - Level3 and Cogent. Introduced source routing and traffic separation between the different
subnets for better utilization of available bandwidth
Developed automated FreeBSD installer based on PXE boot, NFS and bash script. Host for binary packages, cvsup server providing fast updates
of base OS sources
Developed automated Gentoo installer based on PXE boot, NFS, bash script and puppet
Designed custom SuperMicro-based server configurations tailored specifically for the needs of the main application they were meant to run.
Achieved high cost-efficiency due to the lack of big vendor brand name overhead. Incorporated SSD into certain server configurations resulting in
double and triple performance boost over previous setups. Assembled individual hardware components, stress tested complete server
configurations, eliminated bottlenecks and performed hardware troubleshooting
Participated into the migration and merger of Electric Mail with FuseMail and the following technical re-engineering challenges
Implemented ZFS-based backup solutions over NFS and iSCSI providing cheap redundant storage of over 200 TB
Added cacti/rrdtool based graphing and monitoring of Linux and NetApp systems which helped us identify bottlenecks and improve reliability
Provided Tier 2 support to the company's Help Desk

Senior Linux Systems Administrator and Software Developer

November 2009 - February 2010

The Internet Marketing Center, Vancouver, BC
Marketing Resources and Training for Small Businesses

Linux (CentOS, Ubuntu Server) Systems Administration. Server hardware maintenance, troubleshooting and installation
Exim mail server installation and configuration for custom needs. GoodMail integration. SPF and DKIM/DomainKeys
Asterisk PBX configuration, maintenance and troubleshooting
Perl CGI programming

Systems Operations Engineer

September 2008 - October 2009

Electronic Arts (Canada) Inc, Burnaby, BC
Global Interactive Entertainment

Core member of the EA Sports Online Operations Team responsible for EASports.com and EASportsWorld.com
Participated in the full life cycle of PlayStation3 and XBOX360 based console games that used online features provided by our group including
FIFA, Madden, Tiger Woods PGA, NBA, NHL, NCAA, etc.
Provided systems administration, monitoring, maintenance, deployments, troubleshooting and continuous integration services to the web, engine
and game teams involved in the project
Built and maintained the production environment as well as multiple development, test and certification environments
Maintenance, troubleshooting and optimization of applications running on Red Hat Enterprise Servers, JBoss, PHP/Symfony, Memcached,
Oracle, HAproxy
Designed and developed a custom system, based on RRDtool, for analysis and graphical representation of the load and utilization of the backend
infrastructure and the REST interface it provides to users
Software Engineer II title with systems administration and support functions

Senior Linux Systems and Network Administrator

November 2006 - July 2008

ICDSoft Ltd, Sofia, BG
Shared Web Hosting

Administrated large scale (more than 400) Linux and Unix servers (RedHat, Debian, FreeBSD) and Cisco switches
Hardware management, assembly, debugging, stress testing, server monitoring, troubleshooting and high level technical support
Network administration: VLAN, FreeBSD based firewalling with pf and ipfw, RIP, Linux iptables, etc.
Implemented the office open-source PBX based on Asterisk
Resolved customer incidents and security issues

Chief Technical Officer

May 2003 - October 2006

E-Card Ltd, Sofia, BG
Applications Service Provider

Started as a Unix Systems Administrator and shortly after added software development duties (Perl, mod_perl, C). Later officially acquired the title
CTO (Chief Technical Officer) of the company
Analyzed all technical aspects of the projects, architected and implemented solutions
Programmed high-performance server applications of heavily loaded web sites in Perl (mod_perl), C and MySQL
Successfully built and ran high-profile websites like: Big Brother, Star Academy, Who Wants to Be A Millionaire, MVBox, flashassistant.net, IQ test
of the nation
Redesigned the existing online payment system of the company and applied a new security model. Chose the technology, implemented the
system, optimized it and performed a thorough security analysis
Developed premium-rate SMS based applications and video streaming solutions
Used internet telephony based on Asterisk (IAX2 protocol) and implemented a custom VoIP softphone
Created, administrated and maintained the server and office network including BGP, firewall, load balancing, etc.
Worked with short deadlines and always met expectations. The job was a mixture of programming and systems/network administration with
emphasis on programming

Linux Systems and Network Administrator

July 2001 - January 2003

EuroIntegra Ltd, Sofia, BG
Internet Service Provider

Administrated Cisco routers and Linux/FreeBSD servers. Configured and tuned network services for the company and external clients
Built local networks and installed structured cabling. Gained experience with ISDN lines, telephone exchanges, Zyxel DSL routers, DOCSIS cable
modems and networks, Network Access Servers. Supported clients over the telephone and on-site. Created applications for automation of the
administrative tasks

Education
Degree
Major
University

Master
Distributed Systems and Mobile Technologies
Sofia University St. Kl. Ohridski

Degree
Major
University

Bachelor
Computer Science
University of National and World Economy in Sofia

Personal Information
Fluent in English, native in Bulgarian, beginner in French and Russian
Strong team player and fast learner
Dedicated and responsible with attention to detail
Class 5 BC driver's license
References available upon request

September 2006 - unfinished

October 1998 - June 2005

";

//preg_match_all('/"[^"]+"|\S+/', $query, $matches);

//$matches = preg_split("/[\s,]+[\s,]+[\s,]+/", $query);


function split_nth($str, $delim, $n)
{
	return array_map(function($p) use ($delim) {
	return implode($delim, $p);
	}, array_chunk(explode($delim, $str), $n));
}

$arrayed = split_nth($query, " ", 3);

print_r($arrayed);

//print_r($matches);


$json = "{"kind": "Listing", "data": {"modhash": "", "children": [{"kind": "t3", "data": {"domain": "bbc.com", "banned_by": null, "media_embed": {}, "subreddit": "worldnews", "selftext_html": null, "selftext": "", "likes": null, "user_reports": [], "secure_media": null, "link_flair_text": "Ukraine/Russia", "id": "2l8xu5", "gilded": 0, "secure_media_embed": {}, "clicked": false, "report_reasons": null, "author": "ElvenAshwin", "media": null, "score": 37, "approved_by": null, "over_18": false, "hidden": false, "thumbnail": "", "subreddit_id": "t5_2qh13", "edited": false, "link_flair_css_class": "ukrassia", "author_flair_css_class": null, "downs": 0, "mod_reports": [], "saved": false, "is_self": false, "name": "t3_2l8xu5", "permalink": "/r/worldnews/comments/2l8xu5/ukraines_president_threatens_to_scrap_law_giving/", "stickied": false, "created": 1415122620.0, "url": "http://www.bbc.com/news/world-europe-29891556", "author_flair_text": null, "title": "Ukraine's president threatens to scrap law giving rebels autonomy after 'sham' elections", "created_utc": 1415093820.0, "ups": 37, "num_comments": 28, "visited": false, "num_reports": null, "distinguished": null}}, {"kind": "t3", "data": {"domain": "techdirt.com", "banned_by": null, "media_embed": {}, "subreddit": "worldnews", "selftext_html": null, "selftext": "", "likes": null, "user_reports": [], "secure_media": null, "link_flair_text": null, "id": "2la16y", "gilded": 0, "secure_media_embed": {}, "clicked": false, "report_reasons": null, "author": "christ0ph", "media": null, "score": 9, "approved_by": null, "over_18": false, "hidden": false, "thumbnail": "", "subreddit_id": "t5_2qh13", "edited": false, "link_flair_css_class": null, "author_flair_css_class": null, "downs": 0, "mod_reports": [], "saved": false, "is_self": false, "name": "t3_2la16y", "permalink": "/r/worldnews/comments/2la16y/new_zealands_trade_minister_admits_they_keep_tpp/", "stickied": false, "created": 1415151000.0, "url": "http://www.techdirt.com/articles/20141030/16291028989/new-zealands-trade-minister-admits-they-keep-tpp-documents-secret-to-avoid-public-debate.shtml", "author_flair_text": null, "title": "New Zealand\u2019s Trade Minister admits they keep TPP documents secret to avoid \u2019public debate\u2019", "created_utc": 1415122200.0, "ups": 9, "num_comments": 1, "visited": false, "num_reports": null, "distinguished": null}}, {"kind": "t3", "data": {"domain": "theguardian.com", "banned_by": null, "media_embed": {}, "subreddit": "worldnews", "selftext_html": null, "selftext": "", "likes": null, "user_reports": [], "secure_media": null, "link_flair_text": null, "id": "2l90e7", "gilded": 0, "secure_media_embed": {}, "clicked": false, "report_reasons": null, "author": "maxwellhill", "media": null, "score": 31, "approved_by": null, "over_18": false, "hidden": false, "thumbnail": "", "subreddit_id": "t5_2qh13", "edited": false, "link_flair_css_class": null, "author_flair_css_class": null, "downs": 0, "mod_reports": [], "saved": false, "is_self": false, "name": "t3_2l90e7", "permalink": "/r/worldnews/comments/2l90e7/more_than_two_fifths_of_english_fishing_quotas/", "stickied": false, "created": 1415125339.0, "url": "http://www.theguardian.com/environment/2014/nov/04/english-fishing-quotas-foreign-businesses-greenpeace", "author_flair_text": null, "title": "More than two fifths of English fishing quotas 'held by foreign businesses': Greenpeace research shows five largest foreign-owned vessels alone hold 32% of English fishing quotas", "created_utc": 1415096539.0, "ups": 31, "num_comments": 2, "visited": false, "num_reports": null, "distinguished": null}}, {"kind": "t3", "data": {"domain": "theguardian.com", "banned_by": null, "media_embed": {}, "subreddit": "worldnews", "selftext_html": null, "selftext": "", "likes": null, "user_reports": [], "secure_media": null, "link_flair_text": null, "id": "2l6t3a", "gilded": 0, "secure_media_embed": {}, "clicked": false, "report_reasons": null, "author": "ProGamerGov", "media": null, "score": 445, "approved_by": null, "over_18": false, "hidden": false, "thumbnail": "", "subreddit_id": "t5_2qh13", "edited": false, "link_flair_css_class": null, "author_flair_css_class": null, "downs": 0, "mod_reports": [], "saved": false, "is_self": false, "name": "t3_2l6t3a", "permalink": "/r/worldnews/comments/2l6t3a/privacy_not_an_absolute_right_says_gchq_director/", "stickied": false, "created": 1415074367.0, "url": "http://www.theguardian.com/uk-news/2014/nov/03/privacy-gchq-spying-robert-hannigan", "author_flair_text": null, "title": "Privacy not an absolute right, says GCHQ director", "created_utc": 1415045567.0, "ups": 445, "num_comments": 104, "visited": false, "num_reports": null, "distinguished": null}}, {"kind": "t3", "data": {"domain": "m.theage.com.au", "banned_by": null, "media_embed": {}, "subreddit": "worldnews", "selftext_html": null, "selftext": "", "likes": null, "user_reports": [], "secure_media": null, "link_flair_text": null, "id": "2l8z6v", "gilded": 0, "secure_media_embed": {}, "clicked": false, "report_reasons": null, "author": "irish_chippy", "media": null, "score": 32, "approved_by": null, "over_18": false, "hidden": false, "thumbnail": "", "subreddit_id": "t5_2qh13", "edited": false, "link_flair_css_class": null, "author_flair_css_class": null, "downs": 0, "mod_reports": [], "saved": false, "is_self": false, "name": "t3_2l8z6v", "permalink": "/r/worldnews/comments/2l8z6v/owners_of_house_are_facing_a_4000_fine_for/", "stickied": false, "created": 1415124047.0, "url": "http://m.theage.com.au/victoria/raglan-street-port-melbourne-rainbow-fence-owner-sees-blue-over-council-fine-20141020-118jvd.html#ixzz3GdNDUqRY", "author_flair_text": null, "title": "Owners of house are facing a $4000 fine for painting their fence in rainbow colours", "created_utc": 1415095247.0, "ups": 32, "num_comments": 17, "visited": false, "num_reports": null, "distinguished": null}}, {"kind": "t3", "data": {"domain": "washingtonpost.com", "banned_by": null, "media_embed": {}, "subreddit": "worldnews", "selftext_html": null, "selftext": "", "likes": null, "user_reports": [], "secure_media": null, "link_flair_text": "Ebola", "id": "2l9qmh", "gilded": 0, "secure_media_embed": {}, "clicked": false, "report_reasons": null, "author": "guy_of_burning", "media": null, "score": 11, "approved_by": null, "over_18": false, "hidden": false, "thumbnail": "", "subreddit_id": "t5_2qh13", "edited": false, "link_flair_css_class": "ebola", "author_flair_css_class": null, "downs": 0, "mod_reports": [], "saved": false, "is_self": false, "name": "t3_2l9qmh", "permalink": "/r/worldnews/comments/2l9qmh/the_pic_in_this_article_really_puts_the_ebola/", "stickied": false, "created": 1415145594.0, "url": "http://www.washingtonpost.com/blogs/worldviews/wp/2014/11/03/map-the-africa-without-ebola/", "author_flair_text": null, "title": "The pic in this article really puts the Ebola crisis into perspective.", "created_utc": 1415116794.0, "ups": 11, "num_comments": 11, "visited": false, "num_reports": null, "distinguished": null}}, {"kind": "t3", "data": {"domain": "i.stuff.co.nz", "banned_by": null, "media_embed": {}, "subreddit": "worldnews", "selftext_html": null, "selftext": "", "likes": null, "user_reports": [], "secure_media": null, "link_flair_text": "Iraq/ISIS", "id": "2l9n8c", "gilded": 0, "secure_media_embed": {}, "clicked": false, "report_reasons": null, "author": "Cmyers1980", "media": null, "score": 12, "approved_by": null, "over_18": false, "hidden": false, "thumbnail": "", "subreddit_id": "t5_2qh13", "edited": false, "link_flair_css_class": "iraqisis", "author_flair_css_class": null, "downs": 0, "mod_reports": [], "saved": false, "is_self": false, "name": "t3_2l9n8c", "permalink": "/r/worldnews/comments/2l9n8c/new_zealand_prime_minister_to_address_citizens/", "stickied": false, "created": 1415143735.0, "url": "http://i.stuff.co.nz/national/politics/10696378/Kiwi-cash-helping-Isis", "author_flair_text": null, "title": "New Zealand Prime minister to address citizens joining and funding ISIS", "created_utc": 1415114935.0, "ups": 12, "num_comments": 2, "visited": false, "num_reports": null, "distinguished": null}}, {"kind": "t3", "data": {"domain": "theguardian.com", "banned_by": null, "media_embed": {}, "subreddit": "worldnews", "selftext_html": null, "selftext": "", "likes": null, "user_reports": [], "secure_media": null, "link_flair_text": "Ebola", "id": "2l9fdr", "gilded": 0, "secure_media_embed": {}, "clicked": false, "report_reasons": null, "author": "DrogDrill", "media": null, "score": 15, "approved_by": null, "over_18": false, "hidden": false, "thumbnail": "", "subreddit_id": "t5_2qh13", "edited": false, "link_flair_css_class": "ebola", "author_flair_css_class": null, "downs": 0, "mod_reports": [], "saved": false, "is_self": false, "name": "t3_2l9fdr", "permalink": "/r/worldnews/comments/2l9fdr/fresh_ebola_outbreak_in_sierra_leone_raises_fears/", "stickied": false, "created": 1415139085.0, "url": "http://www.theguardian.com/world/2014/nov/04/ebola-outbreak-sierra-leone?CMP=ema_565", "author_flair_text": null, "title": "Fresh Ebola outbreak in Sierra Leone raises fears of new infection chain", "created_utc": 1415110285.0, "ups": 15, "num_comments": 1, "visited": false, "num_reports": null, "distinguished": null}}, {"kind": "t3", "data": {"domain": "aljazeera.com", "banned_by": null, "media_embed": {}, "subreddit": "worldnews", "selftext_html": null, "selftext": "", "likes": null, "user_reports": [], "secure_media": null, "link_flair_text": null, "id": "2l9mmf", "gilded": 0, "secure_media_embed": {}, "clicked": false, "report_reasons": null, "author": "KnoFear", "media": null, "score": 14, "approved_by": null, "over_18": false, "hidden": false, "thumbnail": "", "subreddit_id": "t5_2qh13", "edited": false, "link_flair_css_class": null, "author_flair_css_class": null, "downs": 0, "mod_reports": [], "saved": false, "is_self": false, "name": "t3_2l9mmf", "permalink": "/r/worldnews/comments/2l9mmf/hindu_right_rewriting_indian_textbooks/", "stickied": false, "created": 1415143399.0, "url": "http://www.aljazeera.com/indepth/features/2014/11/hindu-right-ideology-indian-textbooks-gujarat-20141147028501733.html", "author_flair_text": null, "title": "Hindu right rewriting Indian textbooks", "created_utc": 1415114599.0, "ups": 14, "num_comments": 3, "visited": false, "num_reports": null, "distinguished": null}}, {"kind": "t3", "data": {"domain": "upi.com", "banned_by": null, "media_embed": {}, "subreddit": "worldnews", "selftext_html": null, "selftext": "", "likes": null, "user_reports": [], "secure_media": null, "link_flair_text": null, "id": "2l6qce", "gilded": 0, "secure_media_embed": {}, "clicked": false, "report_reasons": null, "author": "HelloiamMiep", "media": null, "score": 441, "approved_by": null, "over_18": false, "hidden": false, "thumbnail": "", "subreddit_id": "t5_2qh13", "edited": false, "link_flair_css_class": null, "author_flair_css_class": null, "downs": 0, "mod_reports": [], "saved": false, "is_self": false, "name": "t3_2l6qce", "permalink": "/r/worldnews/comments/2l6qce/china_unveils_dronefighting_laser_cannons/", "stickied": false, "created": 1415072990.0, "url": "http://www.upi.com/Top_News/World-News/2014/11/03/China-unveils-laser-defense-cannon/6681415038407/", "author_flair_text": null, "title": "China unveils drone-fighting laser cannons", "created_utc": 1415044190.0, "ups": 441, "num_comments": 160, "visited": false, "num_reports": null, "distinguished": null}}, {"kind": "t3", "data": {"domain": "america.aljazeera.com", "banned_by": null, "media_embed": {}, "subreddit": "worldnews", "selftext_html": null, "selftext": "", "likes": null, "user_reports": [], "secure_media": null, "link_flair_text": null, "id": "2l9esp", "gilded": 0, "secure_media_embed": {}, "clicked": false, "report_reasons": null, "author": "_Perfectionist", "media": null, "score": 15, "approved_by": null, "over_18": false, "hidden": false, "thumbnail": "", "subreddit_id": "t5_2qh13", "edited": false, "link_flair_css_class": null, "author_flair_css_class": null, "downs": 0, "mod_reports": [], "saved": false, "is_self": false, "name": "t3_2l9esp", "permalink": "/r/worldnews/comments/2l9esp/un_climate_report_underscores_necessity_of_swift/", "stickied": false, "created": 1415138673.0, "url": "http://america.aljazeera.com/articles/2014/11/2/ipcc-climate-changereport.html", "author_flair_text": null, "title": "UN climate report underscores necessity of swift carbon cuts and says world has until 2100 to reduce greenhouse gas emissions to zero or face \u2018irreversible\u2019 consequences", "created_utc": 1415109873.0, "ups": 15, "num_comments": 6, "visited": false, "num_reports": null, "distinguished": null}}, {"kind": "t3", "data": {"domain": "democracynow.org", "banned_by": null, "media_embed": {}, "subreddit": "worldnews", "selftext_html": null, "selftext": "", "likes": null, "user_reports": [], "secure_media": null, "link_flair_text": null, "id": "2la5h2", "gilded": 0, "secure_media_embed": {}, "clicked": false, "report_reasons": null, "author": "dscales", "media": null, "score": 7, "approved_by": null, "over_18": false, "hidden": false, "thumbnail": "", "subreddit_id": "t5_2qh13", "edited": false, "link_flair_css_class": null, "author_flair_css_class": null, "downs": 0, "mod_reports": [], "saved": false, "is_self": false, "name": "t3_2la5h2", "permalink": "/r/worldnews/comments/2la5h2/yemen_us_drone_strikes_kill_up_to_20_people/", "stickied": false, "created": 1415153055.0, "url": "http://www.democracynow.org/2014/11/4/headlines/yemen_us_drone_strikes_kill_up_to_20_people", "author_flair_text": null, "title": "Yemen: U.S. Drone Strikes Kill Up to 20 People", "created_utc": 1415124255.0, "ups": 7, "num_comments": 2, "visited": false, "num_reports": null, "distinguished": null}}, {"kind": "t3", "data": {"domain": "reuters.com", "banned_by": null, "media_embed": {}, "subreddit": "worldnews", "selftext_html": null, "selftext": "", "likes": null, "user_reports": [], "secure_media": null, "link_flair_text": null, "id": "2l9dwp", "gilded": 0, "secure_media_embed": {}, "clicked": false, "report_reasons": null, "author": "ionised", "media": null, "score": 14, "approved_by": null, "over_18": false, "hidden": false, "thumbnail": "", "subreddit_id": "t5_2qh13", "edited": false, "link_flair_css_class": null, "author_flair_css_class": null, "downs": 0, "mod_reports": [], "saved": false, "is_self": false, "name": "t3_2l9dwp", "permalink": "/r/worldnews/comments/2l9dwp/mexican_police_have_captured_a_fugitive_former/", "stickied": false, "created": 1415138081.0, "url": "http://reuters.com/article/idUSKBN0IO14420141104?irpc=932", "author_flair_text": null, "title": "Mexican police have captured a fugitive former mayor and his wife who the government says were the probable masterminds behind the abduction of 43 student teachers feared massacred in September.", "created_utc": 1415109281.0, "ups": 14, "num_comments": 0, "visited": false, "num_reports": null, "distinguished": null}}, {"kind": "t3", "data": {"domain": "theglobeandmail.com", "banned_by": null, "media_embed": {}, "subreddit": "worldnews", "selftext_html": null, "selftext": "", "likes": null, "user_reports": [], "secure_media": null, "link_flair_text": "Iraq/ISIS", "id": "2l9fd1", "gilded": 0, "secure_media_embed": {}, "clicked": false, "report_reasons": null, "author": "enormousloser", "media": null, "score": 14, "approved_by": null, "over_18": false, "hidden": false, "thumbnail": "", "subreddit_id": "t5_2qh13", "edited": false, "link_flair_css_class": "iraqisis", "author_flair_css_class": null, "downs": 0, "mod_reports": [], "saved": false, "is_self": false, "name": "t3_2l9fd1", "permalink": "/r/worldnews/comments/2l9fd1/canadian_warplanes_blow_up_dump_truck_at_islamic/", "stickied": false, "created": 1415139069.0, "url": "http://www.theglobeandmail.com/news/politics/canadian-warplanes-bomb-islamic-state-construction-site-in-iraq/article21433048/", "author_flair_text": null, "title": "Canadian warplanes blow up dump truck at Islamic State construction site in Iraq", "created_utc": 1415110269.0, "ups": 14, "num_comments": 21, "visited": false, "num_reports": null, "distinguished": null}}, {"kind": "t3", "data": {"domain": "reuters.com", "banned_by": null, "media_embed": {}, "subreddit": "worldnews", "selftext_html": null, "selftext": "", "likes": null, "user_reports": [], "secure_media": null, "link_flair_text": "Study says", "id": "2l77tu", "gilded": 0, "secure_media_embed": {}, "clicked": false, "report_reasons": null, "author": "bleahbloh", "media": null, "score": 252, "approved_by": null, "over_18": false, "hidden": false, "thumbnail": "", "subreddit_id": "t5_2qh13", "edited": false, "link_flair_css_class": "normal", "author_flair_css_class": null, "downs": 0, "mod_reports": [], "saved": false, "is_self": false, "name": "t3_2l77tu", "permalink": "/r/worldnews/comments/2l77tu/petrodollars_leave_world_markets_for_first_time/", "stickied": false, "created": 1415081672.0, "url": "http://www.reuters.com/article/2014/11/03/emerging-oil-petrodollars-idUSL6N0ST2YZ20141103?feedType=RSS&amp;feedName=rbssFinancialServicesAndRealEstateNews", "author_flair_text": null, "title": "Petrodollars leave world markets for first time in 18 years", "created_utc": 1415052872.0, "ups": 252, "num_comments": 32, "visited": false, "num_reports": null, "distinguished": null}}, {"kind": "t3", "data": {"domain": "reuters.com", "banned_by": null, "media_embed": {}, "subreddit": "worldnews", "selftext_html": null, "selftext": "", "likes": null, "user_reports": [], "secure_media": null, "link_flair_text": null, "id": "2l9sxa", "gilded": 0, "secure_media_embed": {}, "clicked": false, "report_reasons": null, "author": "bleahbloh", "media": null, "score": 8, "approved_by": null, "over_18": false, "hidden": false, "thumbnail": "", "subreddit_id": "t5_2qh13", "edited": false, "link_flair_css_class": null, "author_flair_css_class": null, "downs": 0, "mod_reports": [], "saved": false, "is_self": false, "name": "t3_2l9sxa", "permalink": "/r/worldnews/comments/2l9sxa/france_lebanon_sign_saudifunded_arms_deal_worth_3/", "stickied": false, "created": 1415146810.0, "url": "http://www.reuters.com/article/2014/11/04/mideast-crisis-lebanon-arms-idUSL6N0SU3TX20141104", "author_flair_text": null, "title": "France, Lebanon sign Saudi-funded arms deal worth $3 bln", "created_utc": 1415118010.0, "ups": 8, "num_comments": 0, "visited": false, "num_reports": null, "distinguished": null}}, {"kind": "t3", "data": {"domain": "telegraph.co.uk", "banned_by": null, "media_embed": {}, "subreddit": "worldnews", "selftext_html": null, "selftext": "", "likes": null, "user_reports": [], "secure_media": null, "link_flair_text": null, "id": "2lag7e", "gilded": 0, "secure_media_embed": {}, "clicked": false, "report_reasons": null, "author": "guanaco55", "media": null, "score": 4, "approved_by": null, "over_18": false, "hidden": false, "thumbnail": "", "subreddit_id": "t5_2qh13", "edited": false, "link_flair_css_class": null, "author_flair_css_class": null, "downs": 0, "mod_reports": [], "saved": false, "is_self": false, "name": "t3_2lag7e", "permalink": "/r/worldnews/comments/2lag7e/prince_of_waless_plea_to_muslims_over_christian/", "stickied": false, "created": 1415158195.0, "url": "http://www.telegraph.co.uk/news/uknews/prince-charles/11207456/Prince-of-Waless-plea-to-Muslims-over-Christian-persecution.html", "author_flair_text": null, "title": "Prince of Wales\u2019s plea to Muslims over Christian persecution", "created_utc": 1415129395.0, "ups": 4, "num_comments": 0, "visited": false, "num_reports": null, "distinguished": null}}, {"kind": "t3", "data": {"domain": "centerforsecuritypolicy.org", "banned_by": null, "media_embed": {}, "subreddit": "worldnews", "selftext_html": null, "selftext": "", "likes": null, "user_reports": [], "secure_media": null, "link_flair_text": "Israel/Palestine", "id": "2l9k82", "gilded": 0, "secure_media_embed": {}, "clicked": false, "report_reasons": null, "author": "nessy82", "media": null, "score": 11, "approved_by": null, "over_18": false, "hidden": false, "thumbnail": "", "subreddit_id": "t5_2qh13", "edited": false, "link_flair_css_class": "palestisrael", "author_flair_css_class": null, "downs": 0, "mod_reports": [], "saved": false, "is_self": false, "name": "t3_2l9k82", "permalink": "/r/worldnews/comments/2l9k82/qaradawi_issues_call_targeting_israel_over_temple/", "stickied": false, "created": 1415142080.0, "url": "http://www.centerforsecuritypolicy.org/2014/11/04/qaradawi-issues-call-targeting-israel-over-temple-mount/", "author_flair_text": null, "title": "Qaradawi Issues Call Targeting Israel over Temple Mount", "created_utc": 1415113280.0, "ups": 11, "num_comments": 2, "visited": false, "num_reports": null, "distinguished": null}}, {"kind": "t3", "data": {"domain": "npr.org", "banned_by": null, "media_embed": {}, "subreddit": "worldnews", "selftext_html": null, "selftext": "", "likes": null, "user_reports": [], "secure_media": null, "link_flair_text": null, "id": "2la6qq", "gilded": 0, "secure_media_embed": {}, "clicked": false, "report_reasons": null, "author": "playa9383", "media": null, "score": 5, "approved_by": null, "over_18": false, "hidden": false, "thumbnail": "", "subreddit_id": "t5_2qh13", "edited": false, "link_flair_css_class": null, "author_flair_css_class": null, "downs": 0, "mod_reports": [], "saved": false, "is_self": false, "name": "t3_2la6qq", "permalink": "/r/worldnews/comments/2la6qq/army_eyes_3d_printed_food_for_soldiers/", "stickied": false, "created": 1415153655.0, "url": "http://www.npr.org/blogs/alltechconsidered/2014/11/04/361187352/army-eyes-3d-printed-food-for-soldiers", "author_flair_text": null, "title": "Army Eyes 3-D Printed Food for Soldiers", "created_utc": 1415124855.0, "ups": 5, "num_comments": 7, "visited": false, "num_reports": null, "distinguished": null}}, {"kind": "t3", "data": {"domain": "zeenews.india.com", "banned_by": null, "media_embed": {}, "subreddit": "worldnews", "selftext_html": null, "selftext": "", "likes": null, "user_reports": [], "secure_media": null, "link_flair_text": null, "id": "2lad3k", "gilded": 0, "secure_media_embed": {}, "clicked": false, "report_reasons": null, "author": "fagers91", "media": null, "score": 6, "approved_by": null, "over_18": false, "hidden": false, "thumbnail": "", "subreddit_id": "t5_2qh13", "edited": false, "link_flair_css_class": null, "author_flair_css_class": null, "downs": 0, "mod_reports": [], "saved": false, "is_self": false, "name": "t3_2lad3k", "permalink": "/r/worldnews/comments/2lad3k/us_navy_seals_warned_against_disclosing_secrets/", "stickied": false, "created": 1415156669.0, "url": "http://zeenews.india.com/news/world/us-navy-seals-warned-against-disclosing-secrets_1493956.html", "author_flair_text": null, "title": "US Navy SEALs warned against disclosing secrets: The elite US Navy SEALs have been warned against betraying their promise to maintain secrecy and not speak to the media to gain \"public notoriety and financial gain\"", "created_utc": 1415127869.0, "ups": 6, "num_comments": 2, "visited": false, "num_reports": null, "distinguished": null}}, {"kind": "t3", "data": {"domain": "rferl.org", "banned_by": null, "media_embed": {}, "subreddit": "worldnews", "selftext_html": null, "selftext": "", "likes": null, "user_reports": [], "secure_media": null, "link_flair_text": null, "id": "2l5n8p", "gilded": 0, "secure_media_embed": {}, "clicked": false, "report_reasons": null, "author": "Libertatea", "media": null, "score": 1034, "approved_by": null, "over_18": false, "hidden": false, "thumbnail": "", "subreddit_id": "t5_2qh13", "edited": false, "link_flair_css_class": null, "author_flair_css_class": null, "downs": 0, "mod_reports": [], "saved": false, "is_self": false, "name": "t3_2l5n8p", "permalink": "/r/worldnews/comments/2l5n8p/monument_to_apples_jobs_removed_in_russia_after/", "stickied": false, "created": 1415051698.0, "url": "http://www.rferl.org/content/russia-st-petersburg-monument-iphone-jobs-cook-gay/26671992.html", "author_flair_text": null, "title": "Monument To Apple's Jobs Removed In Russia After CEO Comes Out", "created_utc": 1415022898.0, "ups": 1034, "num_comments": 224, "visited": false, "num_reports": null, "distinguished": null}}, {"kind": "t3", "data": {"domain": "theguardian.com", "banned_by": null, "media_embed": {}, "subreddit": "worldnews", "selftext_html": null, "selftext": "", "likes": null, "user_reports": [], "secure_media": null, "link_flair_text": null, "id": "2l9cii", "gilded": 0, "secure_media_embed": {}, "clicked": false, "report_reasons": null, "author": "EightRoundsRapid", "media": null, "score": 11, "approved_by": null, "over_18": false, "hidden": false, "thumbnail": "", "subreddit_id": "t5_2qh13", "edited": false, "link_flair_css_class": null, "author_flair_css_class": null, "downs": 0, "mod_reports": [], "saved": false, "is_self": false, "name": "t3_2l9cii", "permalink": "/r/worldnews/comments/2l9cii/australians_and_new_zealanders_should_be_free_to/", "stickied": false, "created": 1415137100.0, "url": "http://www.theguardian.com/world/2014/nov/03/australians-new-zealanders-free-live-work-uk-report", "author_flair_text": null, "title": "Australians and New Zealanders should be free to live and work in UK, report says | Commonwealth Exchange report proposes bilateral mobility zones between the UK, Australia, New Zealand and Canada", "created_utc": 1415108300.0, "ups": 11, "num_comments": 9, "visited": false, "num_reports": null, "distinguished": null}}, {"kind": "t3", "data": {"domain": "news.vice.com", "banned_by": null, "media_embed": {}, "subreddit": "worldnews", "selftext_html": null, "selftext": "", "likes": null, "user_reports": [], "secure_media": null, "link_flair_text": null, "id": "2la88w", "gilded": 0, "secure_media_embed": {}, "clicked": false, "report_reasons": null, "author": "guanaco55", "media": null, "score": 4, "approved_by": null, "over_18": false, "hidden": false, "thumbnail": "", "subreddit_id": "t5_2qh13", "edited": false, "link_flair_css_class": null, "author_flair_css_class": null, "downs": 0, "mod_reports": [], "saved": false, "is_self": false, "name": "t3_2la88w", "permalink": "/r/worldnews/comments/2la88w/politics_permeate_malaysian_opposition_leaders/", "stickied": false, "created": 1415154344.0, "url": "https://news.vice.com/article/politics-permeate-malaysian-opposition-leaders-sodomy-trial", "author_flair_text": null, "title": "Politics Permeate Malaysian Opposition Leader's Sodomy Trial", "created_utc": 1415125544.0, "ups": 4, "num_comments": 1, "visited": false, "num_reports": null, "distinguished": null}}, {"kind": "t3", "data": {"domain": "nknews.org", "banned_by": null, "media_embed": {}, "subreddit": "worldnews", "selftext_html": null, "selftext": "", "likes": null, "user_reports": [], "secure_media": null, "link_flair_text": null, "id": "2l95qm", "gilded": 0, "secure_media_embed": {}, "clicked": false, "report_reasons": null, "author": "JenniferD86", "media": null, "score": 15, "approved_by": null, "over_18": false, "hidden": false, "thumbnail": "", "subreddit_id": "t5_2qh13", "edited": false, "link_flair_css_class": null, "author_flair_css_class": null, "downs": 0, "mod_reports": [], "saved": false, "is_self": false, "name": "t3_2l95qm", "permalink": "/r/worldnews/comments/2l95qm/ask_a_north_korean_why_real_news_about_crime/", "stickied": false, "created": 1415131293.0, "url": "http://www.nknews.org/2014/11/news-and-newsworthiness-in-n-korea-why-it-doesnt-exist/", "author_flair_text": null, "title": "Ask a North Korean: Why real news about crime, catastrophe and corruption does not exist in DPRK media", "created_utc": 1415102493.0, "ups": 15, "num_comments": 9, "visited": false, "num_reports": null, "distinguished": null}}, {"kind": "t3", "data": {"domain": "dw.de", "banned_by": null, "media_embed": {}, "subreddit": "worldnews", "selftext_html": null, "selftext": "", "likes": null, "user_reports": [], "secure_media": null, "link_flair_text": "Ukraine/Russia", "id": "2ladlt", "gilded": 0, "secure_media_embed": {}, "clicked": false, "report_reasons": null, "author": "fagers91", "media": null, "score": 4, "approved_by": null, "over_18": false, "hidden": false, "thumbnail": "", "subreddit_id": "t5_2qh13", "edited": false, "link_flair_css_class": "ukrassia", "author_flair_css_class": null, "downs": 0, "mod_reports": [], "saved": false, "is_self": false, "name": "t3_2ladlt", "permalink": "/r/worldnews/comments/2ladlt/nato_russian_troops_moving_toward_border_with/", "stickied": false, "created": 1415156901.0, "url": "http://www.dw.de/nato-russian-troops-moving-toward-border-with-ukraine/a-18039032", "author_flair_text": null, "title": "NATO: Russian troops moving toward border with Ukraine", "created_utc": 1415128101.0, "ups": 4, "num_comments": 2, "visited": false, "num_reports": null, "distinguished": null}}], "after": "t3_2ladlt", "before": "t3_2l8xu5"}}";


?>