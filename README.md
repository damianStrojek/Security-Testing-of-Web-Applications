# Environment for Security Tests of Web Applications

## Description

The aim of the project was to create an environment that will allow conducting experiments on the security of web applications by emulating popular types of their vulnerabilities and interacting with them in a controlled manner. 

The environment allows for the implementation of various methods of attack, defense and detection of vulnerabilities. The created product is to be characterized by an extensible architecture, allowing for the addition of new modules enabling the emulation of new vulnerabilities and the use of new detection, attack and defense tools.

## Local Deployment

To deploy the environment locally you need to `clone` this repository and host it using one of many ways. 

```bash
# Get the latest version of docker
sudo apt-get install docker.io

# Hosting PHP server on port 80 of localhost using docker container
git clone https://github.com/damianStrojek/Security-Testing-of-Web-Applications.git
cd Security-Testing-of-Web-Applications
docker build -t stewa .
docker run --log-driver=json-file --log-opt max-size=100m --log-opt max-file=3 -dp 127.0.0.1:80:80 stewa

# Check status of your container
docker ps

# Hosting HTTP server on port 80 using python3
python3 -m http.server 80
```

## Usage

The system allows you to set up a web application security testing environment at any time and anywhere. The entire theory and tips on how to perform tasks are included in individual modules. We recommend setting up an environment on [Kali Linux](https://www.kali.org/).

https://github.com/damianStrojek/Security-Testing-of-Web-Applications/assets/67586060/a51d10c5-c089-4450-9e8b-c8f8d43f39e2

## Advisory

All the scripts/theory/tools included in this repository should be used for authorized penetration testing and/or educational purposes only. Any misuse of this software will not be the responsibility of the author or of any other collaborator. Use it at your own networks and/or with the network owner's permission.

## Credits, Literature

[1] Michał Sajdak, Michał Bentkowski, Gynvael Coldwind et al.: Security of web applications, SECURITUM Publishing House. Available at: [Securitum.pl](https://sklep.securitum.pl/ksiazka-bezpieczenstwo-aplikacji-webowych)

[2] Act of 6 June 1997 - Penal Code. Available at: [Legal act (sejm.gov.pl)](https://isap.sejm.gov.pl/isap.nsf/download.xsp/WDU19970880553/U/D19970553Lj.pdf)

[3] Judgment III K 865/15. Available at: [Portal of Judgments of the District Court in Wałbrzych (walbrzych.sr.gov.pl)](https://orzeczenia.walbrzych.sr.gov.pl/content/$N/155020200001506_III_K_000865_2015_Uz_2016-09-23_001)

[4] Dr. Adam Behan, article on types of crimes in information systems. Available at: [Modern IT systems and types of crimes under Art. 267 of the Penal Code - Edition - 2/2020 | Palestra](https://palestra.pl/pl/czasopismo/wydanie/2-2020/artykul/wspolczesne-systemy-informatyczne-a-typy-przestepstw-z-art.-267-kodeksu-karnego)

[5] 2023 Data Breach Report, Verizon. Available at: [2023 Data Breach Investigations Report | Verizon](https://www.verizon.com/business/resources/reports/dbir/)

[6] OWASP Top Ten Report for 2021. Available at: [OWASP Top Ten | OWASP Foundation](https://owasp.org/www-project-top-ten/)

[7] Wikipedia, brute-force attacks. Available at: [Brute-force attack - Wikipedia](https://en.wikipedia.org/wiki/Brute-force_attack)

[8] RFC 2965. Available at: [RFC 2965: HTTP State Management Mechanism (rfc-editor.org)](https://www.rfc-editor.org/rfc/rfc2965)

[9] "Injection" vulnerability from the OWASP Top 10 2021 list. Available at: [A03 Injection - OWASP Top 10: 2021](https://owasp.org/Top10/A03_2021-Injection/)

[10] Microsoft documentation – SQL Injection. Available at: [SQL Injection - SQL Server | Microsoft Learn](https://learn.microsoft.com/en-us/sql/relational-databases/security/sql-injection?view=sql-server-ver16)

[11] NERA BESIC, article on "Blind SQL Injection". Available at: [Blind SQL Injection: How it Works, Examples and Prevention (brightsec.com)](https://brightsec.com/blog/blind-sql-injection/)

[12] KirstenS, article on Cross Site Scripting for OWASP. Available at: [Cross Site Scripting (XSS) | OWASP Foundation](https://owasp.org/www-community/attacks/xss/)

[13] 2000 CERT Advisories, page 4. Available at: [2000 CERT Advisories (cmu.edu)](https://insights.sei.cmu.edu/documents/507/2000_019_001_496188.pdf)

[14] Amit Klein, "A look at an overlooked flavor of XSS." Available at: [Web Security Articles - Web Application Security Consortium (webappsec.org)](http://www.webappsec.org/projects/articles/071105.shtml)

[15] BUSRA DEMIR, article on command injection. Available at: [Pentester's Guide to Command Injection | Cobalt (cobalt.io)](https://www.cobalt.io/blog/a-pentesters-guide-to-command-injection)

[16] Robert Auger, article on the Path Traversal attack for The Web Application Security Consortium. Available at: [The Web Application Security Consortium / Path Traversal (webappsec.org)](http://projects.webappsec.org/w/page/13246952/Path%20Traversal)

[17] PortSwigger, Path Traversal vulnerability. Available at: [What is path traversal, and how to prevent it? | Web Security Academy (portswigger.net)](https://portswigger.net/web-security/file-path-traversal)

[18] Wikipedia, entry on path traversal attack. Available at: [Directory traversal attack - Wikipedia](https://en.wikipedia.org/wiki/Directory_traversal_attack)

[19] Kaspersky IT Encyclopedia. Available at: [Exploitation in the wild (ITW) | Kaspersky IT Encyclopedia](https://encyclopedia.kaspersky.com/glossary/exploitation-in-the-wild-itw/#:~:text=A%20term%20defining%20the%20scope,on%20computers%20for%20research%20purposes.)

[20] Introduction to the Panama Papers case. Available at: [Giant Leak of Offshore Financial Records Exposes Global Array of Crime and Corruption - The Panama Papers (occrp.org)](https://www.occrp.org/en/panamapapers/overview/intro/)

[21] Isaiah Chua, blog post on examples of vulnerabilities exploited in real life. Available at: [Real Life Examples of Web Vulnerabilities (OWASP Top 10) (horangi.com)](https://www.horangi.com/blog/real-life-examples-of-web-vulnerabilities)

[22] Microsoft, Guidance on Preventing, Detecting, and Finding the Log4j2 Vulnerability. Available at: [Guidance for preventing, detecting, and hunting for exploitation of the Log4j 2 vulnerability | Microsoft Security Blog](https://www.microsoft.com/en-us/security/blog/2021/12/11/guidance-for-preventing-detecting-and-hunting-for-cve-2021-44228-log4j-2-exploitation/)

[23] List of released Log4j2 versions. Available at: [Log4j – Download Apache Log4j™ 2](https://logging.apache.org/log4j/2.x/download.html)

[24] Fabiwanne, Wikipedia, entry regarding the Hydra tool. Available at: [Hydra (software) - Wikipedia](https://en.wikipedia.org/wiki/Hydra_(software))

[25] Kali, Hydra documentation. Available at: [hydra | Kali Linux Tools](https://www.kali.org/tools/hydra/)

[26] Kali, gobuster documentation. Available at: [gobuster | Kali Linux Tools](https://www.kali.org/tools/gobuster/)

[27] Sanskar Dwivedi, article "Introduction to Burp Suite and its testing options". Available at: [Introduction to Burp Suite and its Testing Features (perficient.com)](https://blogs.perficient.com/2023/03/17/introduction-to-burp-suite-and-its-testing-features/)

[28] Jim1138, Wikipedia, entry regarding OWASP ZAP. Available at: [OWASP ZAP – Wikipedia, the free encyclopedia](https://en.wikipedia.org/wiki/OWASP_ZAP)

[29] Bernardo Damele A. G., Miroslav Stampar, introduction to the sqlmap tool. Available at: [sqlmap: automatic SQL injection and database takeover tool](https://sqlmap.org/)

[30] Editorial team of the website dlatesterów.pl, article "SQLMap Tool for Pentests". Available at: [SQLMap pentesting tool - dlaTesterów.PL (dlasterow.pl)](https://www.dlatesterow.pl/sqlmap-narzedzie-do-pentestow/)

[31] Scrum.org, Article "What is SCRUM?". Available at: [What is Scrum? | Scrum.org](https://www.scrum.org/resources/what-scrum-module)

[32] pm-partners, scrum terminology. Available at: [What is Scrum? | The Agile Journey with PM-Partners](https://www.pm-partners.com.au/the-agile-journey-a-scrum-overview/)

[33] Team TIS, 15 best practices for creating web applications. Available at: [Web Application Development Best Practices: 15 Best Practices (tisdigitech.com)](https://www.tisdigitech.com/blog/best-practices-of-web-application-development/#1-keep-it-simple)

[34] Oracle Polska, "What is Docker?". Available at: [What is Docker | Oracle Poland](https://www.oracle.com/pl/cloud/cloud-native/container-registry/what-is-docker/)

[35] Docker Documentation, section for Dockerfile. Available at: [Dockerfile reference | Docker Docs](https://docs.docker.com/engine/reference/builder/)

[36] Docker documentation, system event logging section. Available at: [Configure logging drivers | Docker Docs](https://docs.docker.com/config/containers/logging/configure/)

[37] PATKOWSKI A. E., P-PEN methodology for conducting penetration tests of ICT systems, "Bulletin of the Institute of Automation and Robotics" No. 24/2007, Military University of Technology, 2007. Available at: [Bulletin of the Institute of Automation and Robotics - Volume R. 13, No. 24 (2007) - BazTech - Yadda (icm.edu.pl)](https://yadda.icm.edu.pl/baztech/element/bwmeta1.element.baztech-article-BWAK-0008-0005?q=bwmeta1.element.baztech-volume-1427-3578-biuletyn_instytutu_automatyki_i_robotyki-2007-nr_24;4&qt=CHILDREN-STATELESS)
