Exercises  Chapter 4 P. 93
Please CITE any pages you use for an answer. All answers are in the book, no need to use the web (unless instructed too)
1.	Describe the single-machine, three-tier, and four-tier web application architectures. 
 Ans: Single Machine Architecture: The system runs on the software which receives HTTP protocol requests, process them , generate results & send them as reply. The web server generates web pages from following sources:
Static Content: Files are read from local storage & sent to the user unchanged. 
Dynamic Content: The programs generate HTML requests & depending on the request the other output is being sent to the user.
Database Driven Dynamic Content: Here, the programs run on the server. It consults with the database for more information & depending on that information it generates the output. 
This kind of architecture is used for many small applications. It has its own limitations. Eg: It cannot store the data more than the single machine can store.
Three Tier architecture: It consist of three layers: Load Balancers, Web server & data service layer. The web servers are dependent on SQL server at backend. The request is being sent to load balancer first. Then load balancer sent it to web server. The web server processes the request with the help of database. Then it generates the reply & sent it back to load balancer. The load balancer receives the reply & transfers it to one of its replicas & then it forwards the reply to user.
Four Tier Architecture: Here, the load balancer receives the 
requests & divides the traffic with various frontends. The frontend interacts with users & communicates with application server for content. The application server accesses the shared data in the final layer. 
(Section 4.1, 4.2, 4.3)

2.	Describe how a single-machine webserver, which uses a database to generate content, might evolve to a three-tier webserver.  How would this be done with minimal downtime?
Ans: In the single machine webserver, the system runs on the software which receives HTTP protocol requests, process them, generate results & send them as reply. To evolve it to three tier webservers, Load balancer needs to be added to the architecture layer. 


3. Describe the common web service architectures, in order from smallest to largest. 
Ans: Smallest Web Service architecture: It is single machine & self-sufficient web service architecture which is used to provide web services. The machine has software which receives the HTTP protocols, receives client requests & process them & generate the response in HTTP. The response is static, dynamic or database driven. This is not very reliable source because here only one machine performs all the task & failure of it would be loss of data.
Three Tier Web service: It consist of three layers: Load Balancers, Web server & data service layer. Here two functions are performed on different physical machines & load balancer takes care of requests distribution to the application server. Here, The web servers are dependent on SQL server at backend. There is high redundancy at this level of web service architecture but environment is quite secure as compare to first tier web service architecture.

Four tier web service:  It has same structure as that of three tier web services, but another layer is added below to the load balancer. It is called as Front end web server. It takes care of tasks such as session pipelining, compression, cookie processing & encryption. It also handles tracking of HTTP protocols, so that application server doesn’t need to track it down.  It implements HTTP 2.0 protocols fully. It tracks down all the changes & updates the application server, even if application server doesn’t need to be updated. 
(Section 4.1, 4.2, 4.3)


4. Describe how different local load balancer types work and what their pros and cons are. You may choose to make a comparison chart. 
Ans: The types of Load balancers are as follows:
DNS round robin: In this type, one by one load balancers distribute requests to all servers. It picks up web requests randomly & then when the multitude of web browsers visit the site, the load is evenly distributed among several load balancers.
Layer 3 & 4 load balancer: It tracks TCP sessions depending on source & destination IP. It sends all traffic to the servers irrespective of number of sessions.
Pros: Here, if one of the replica goes down, the traffic will be routed to the other replicas.
User interacts with same server throughout the session. These load balancers are simple & fast compare to Round robin type load balancers.
Layer 7 Load Balancer: It works same as that of Layer 3 & 4 load balancers. In addition to them, it checks the HTTP protocol stack & makes the decision respectively. Eg: Layer 7 Load Balancer checks the weather & send a traffic to different set of servers bases on criteria.
(Section: 4.2)

5. What is “shared state” and how is it maintained between replicas? 
Ans: Here, the information which is generated is being stored at backend where it can be accessed by all replicas. For each HTTP connection state is fetched from different stored locations. 
(Section: 4.2.3)


6. What are the services that a four-tier architecture provides in the 1rst tier? 
The first tier communicates with the load balancer to divides the traffic among various frontend. The first tier takes care of the communication between user & the application server.
The first tier takes care of a tasks such as session pipelining, compression, cookie processing & encryption.
It also handles tracking of HTTP protocols, so that application server doesn’t need to track it down. 
It implements HTTP 2.0 protocols fully. 
It tracks down all the changes & updates the application server, even if application server doesn’t need to be updated. 
Front end process takes care of everything from user’s log in to log out. It handles all the problems so that application server doesn’t have to.
(Section 4.1, 4.2, 4.3)


7. What does a reverse proxy do? When is it needed? 
Ans: It is proxy server which retrieves the resources on the behalf client from one or more servers. These resources are then returned to client as if they are originated from the web server itself. The reverse proxy is an intermediary for its associated servers to be contacted by any client.
Applications:
•	It hides the existence & characteristics of an origin server.
•	Application firewall protects against web based attaches. Without reverse proxy, removing malwares would be difficult. 
•	For secure websites, the reverse proxy is equipped with SSL acceleration hardware.
•	It distributes the load from incoming requests to several servers, with each server serving its own application area.
(Section: 4.4)


8. Suppose you wanted to build a simple image-sharing web site. How would you design it if the site was intended to serve people in one region of the world? How would you then expand it to work globally? 
Ans: When we are creating a website for one region, we will define a method named region. We will define respective coordinates of that region in that method. The method will be executed, if somebody from the same region tries to access the website & the website will be displayed. Else method will not be executed & website will not be displayed. 
When we are doing it for global, we won’t declare that method. Therefore, it will remove the regional constraint from the website & will be accessed all over the globe.
Or
When we are creating a website, we can declare method where the site will be executed if it is accessed by the DNS local load balancer. That is how we can limit the use of website for one region.
We are creating a website, we can make a use of DNS Global load balancer. So, we can extend the accessibility over the globe.
(Section: 4.5)


9. What is a message bus architecture and how might one be used? 
Ans: It is combination of common data model. Here the common command is set & then messaging infrastructure allows different systems to communicate through shared set of interfaces. 
It contains following elements:
•	A set of agreed-upon message schemas
•	A set of common command messages 
•	A shared infrastructure for sending bus messages to recipients
When the application passes the message to the message bus, the message bus transports that message to the applications which are listening the messages through interface. Similarly an application which receives the message, it does not receive it from the sender instead it receives it from message bus. The message bus reduces the fan out of each application from many to one.
(Section: 4.6)


10. What is an SOA? 
Ans: It’s a software designing where services are provided to other components by application components through communication protocol over network. 
It is independent of vendors, products & technologies. A service is discrete unit of functionality which is accessed remotely & updated independently.
It has following properties:
•	It represents a business activity with specifies outcome.
•	It is self-contained.
•	It is black box for its consumers.
•	It may consist of other underlying services.
The SOA is less about how to modularize an application & more about how to compose an application by integration of distributed, separately maintained & deployed software components. It is enabled by technology & standards which makes it easier for components to communicate & cooperate over a network esp. IP network.


11. Why are SOAs loosely coupled? 
Ans: The loose coupling in SOA is influenced by object oriented design paradigm. Here the objective is to reduce coupling between classes to foster an environment where both classes are somehow related to each other & it can be changed in such way that their change does not break their existing relationship for working of the software. In SOA, the emphasis is on the service contract as the service contract acts as an interface to communicate with service logic & vice versa. SOA advocates the development of physically independent service contracts from the service logic & technology independence. In SOA, the services are having loosely coupled contracts which directly supports the increased vendor diversity options & increased interoperability.


12. How would you design an email system as an SOA? 
Ans: When we are designing the mail box system we will mentioned the domain-name  which specifies the mail box of the person responsible for this zone. This will help to access the mails it by the respective person only.


13. Who was Christopher Alexander and what was his contribution to architecture?
Ans: He is widely influential architect & design theorist & also professor at University of California, Berkeley. His theories about Human Centered design have affected fields beyond architecture including Urban Design, software, Sociology & others. He has designed & built over 100 buildings as an architect & contractor. In software industry, he is considered as Father of Pattern Language movement. His work has influenced the development of Agile Software Development.
Alexander’s work is characterized by special quality which is related to the Human Beings & produces feelings of belonging to the place & structure. He tried to capture a quality which is the quality without a name", but named "wholeness" in Nature of Order with his sophisticated mathematical design theories. His work is Eishin Campus enar Tokyo, The West Dean Visitors Centre in West Sussex, England, Julian Street Inn in San Joese, California, the Sala House 7 Martinez House in Albany & California respectively, low cost housing in Mexicali, Mexico & several private houses.

 

