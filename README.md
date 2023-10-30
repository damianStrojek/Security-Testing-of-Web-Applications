# Environment for Security Tests of Web Applications

## Description

The aim of the project is to create an environment that will allow conducting experiments on the security of web applications by emulating popular types of their vulnerabilities and interacting with them in a controlled manner. 

The environment allows for the implementation of various methods of attack, defense and detection of vulnerabilities. The created product is to be characterized by an extensible architecture, allowing for the addition of new modules enabling the emulation of new vulnerabilities and the use of new detection, attack and defense tools.

## Local Deployment

To deploy the environment locally you need to `clone` this repository and host it using one of many ways. 

```bash
# Get the latest version of docker
sudo apt-get install docker.io

# Hosting HTTP server on port 80 of localhost using docker container
git clone https://github.com/damianStrojek/Security-Testing-of-Web-Applications.git
cd Security-Testing-of-Web-Applications
docker build -t stewa .
docker run -dp 127.0.0.1:80:80 stewa

# Check status of your container
docker ps
```

## Usage

The system allows you to set up a web application security testing environment at any time and anywhere. The entire theory and tips on how to perform tasks are included in individual modules. We recommend setting up an environment on [Kali Linux](https://www.kali.org/).

## Advisory

All the scripts/theory/tools included in this repository should be used for authorized penetration testing and/or educational purposes only. Any misuse of this software will not be the responsibility of the author or of any other collaborator. Use it at your own networks and/or with the network owner's permission.

## Credits, Literature

[1] Michał Sajdak, Michał Bentkowski, Gynvael Coldwind et al.: Security of web applications, SECURITUM Publishing House. Available at: [Securitum.pl](https://sklep.securitum.pl/ksiazka-bezpieczenstwo-aplikacji-webowych)

[2] Act of 6 June 1997 - Penal Code. Available at: [Legal act (sejm.gov.pl)](https://isap.sejm.gov.pl/isap.nsf/download.xsp/WDU19970880553/U/D19970553Lj.pdf)

[3] Judgment III K 865/15. Available at: [Portal of Judgments of the District Court in Wałbrzych (walbrzych.sr.gov.pl)](https://orzeczenia.walbrzych.sr.gov.pl/content/$N/155020200001506_III_K_000865_2015_Uz_2016-09-23_001)

[4] Dr. Adam Behan, article on types of crimes in information systems. Available at: [Modern IT systems and types of crimes under Art. 267 of the Penal Code - Edition - 2/2020 | Palestra](https://palestra.pl/pl/czasopismo/wydanie/2-2020/artykul/wspolczesne-systemy-informatyczne-a-typy-przestepstw-z-art.-267-kodeksu-karnego)

[5] 2000 CERT Advisories, page 4. Available at: [2000 CERT Advisories (cmu.edu)](https://insights.sei.cmu.edu/documents/507/2000_019_001_496188.pdf)

[6] 2023 Data Breach Report, Verizon. Available at: [2023 Data Breach Investigations Report | Verizon](https://www.verizon.com/business/resources/reports/dbir/)

[7] OWASP Top Ten Report for 2021. Available at: [OWASP Top Ten | OWASP Foundation](https://owasp.org/www-project-top-ten/)

[8] JWT creators website. Available at: [JSON Web Tokens - jwt.io](https://jwt.io/)

[9] HTML documentation maintained by Mozilla. Available at: [Strict-Transport-Security - HTTP | MDN (mozilla.org)](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security)

[10] RFC 2965. Available at: [RFC 2965: HTTP State Management Mechanism (rfc-editor.org)](https://www.rfc-editor.org/rfc/rfc2965)

[11] CyberChef decoding tool. Available at: [CyberChef (gchq.github.io)](https://gchq.github.io/CyberChef/)

[12] Amit Klein, "A look at an overlooked flavor of XSS." Available at: [Web Security Articles - Web Application Security Consortium (webappsec.org)](http://www.webappsec.org/projects/articles/071105.shtml)

[13] Microsoft documentation – SQL Injection. Available at: [SQL Injection - SQL Server | Microsoft Learn](https://learn.microsoft.com/en-us/sql/relational-databases/security/sql-injection?view=sql-server-ver16)

[14] NERA BESIC, article on "Blind SQL Injection". Available at: [Blind SQL Injection: How it Works, Examples and Prevention (brightsec.com)](https://brightsec.com/blog/blind-sql-injection/)

[15] PATKOWSKI A. E., P-PEN methodology for conducting penetration tests of ICT systems, "Bulletin of the Institute of Automation and Robotics" No. 24/2007, Military University of Technology, 2007. Available at: [Bulletin of the Institute of Automation and Robotics - Volume R. 13, No. 24 (2007) - BazTech - Yadda (icm.edu.pl)](https://yadda.icm.edu.pl/baztech/element/bwmeta1.element.baztech-article-BWAK-0008-0005?q=bwmeta1.element.baztech-volume-1427-3578-biuletyn_instytutu_automatyki_i_robotyki-2007-nr_24;4&qt=CHILDREN-STATELESS)

[16] BUSRA DEMIR, article on command injection. Available at: [Pentester's Guide to Command Injection | Cobalt (cobalt.io)](https://www.cobalt.io/blog/a-pentesters-guide-to-command-injection)
