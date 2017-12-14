Exercises  Chapter 5 P. 116
Please CITE any pages you use for an answer. All answers are in the book, no need to use the web (unless instructed too)

# 1.	What is scaling?
Ans: It’s the ability to process a growing a workload, usually which is measured in transactions per second with respect to amount of data or number of users. There is always a limit for growth a machine can handle. To increase the growth machine needs to be scaled.
(Section: 5 before 5.1)

# 2.	What are the options for scaling a service that is CPU bound?
Ans: Services which are bound with CPU & needs to be scaled, need a faster CPT or more CPUs or more RAMs or Faster Disks, Faster Network Interfaces etc.
(Section: 5.2)

# 3.	What are the options for scaling a service whose storage requirements are growing?
Ans: The scaling options are as follows:
•	Replicate the entire system (horizontal duplication)
•	Split the system into individual functions, services, or resources (functional or service splits)
•	split the system into individual chunks (lookup or formulaic splits)

Horizontal Duplication: It increases throughput by replicating the services. It is also called as Horizontal Scaling. 
Eg: Many replicas work behind the load balancer.
This kind of scaling does not work well with increase in data or with complex transactions which needs to be taken care by different handling. To take care of this situation, each transaction can be run independently on all the replicas. It helps to improve the performance which is proportional to the number of replicas.

Functional Or Service Splits: It means that scaling up the system by splitting each individual function to allocate additional resources. To use the separating functions, it needs to be loosely coupled. It involves splitting of work flows & transaction types. 
This technique involves the following:
• Splitting by function, with each function on its own machine
• Splitting by function, with each function on its own pool of machines
• Splitting by transaction type
• Splitting by type of user
Look Up Oriented Split: Here, the system can be scaled up by splitting the data in identifiable segments each of which is given dedicated resources. This technique is like Functional or Service Splits except it divides the data instead of processing.
(Section: 5.3, 5.3.1, 5.3.2, 5.3.3) 

# 4.	The data in Figure 1.10 is outdated because hardware tends to get less expensive every year. Update the chart for the current year. Which items changed the least? Which changed the most?
Ans: 
![Week6-question5](https://github.com/illinoistech-itm/kphadatare/blob/master/ITMO-544/images/WhatsApp%20Image%202017-10-07%20at%209.33.39%20PM.jpeg)


# 5.	Rewrite the data in Figure 1.10 in terms of proportion. If reading from main memory took 1 second, how long would the other operations take? For extra credit, draw your answer to resemble a calendar or the solar system.
Ans: Here, we performed the calculation of 1 MB data which is being read sequentially from the main memory & it took 1 second to complete the task. So, we calculate the following proportionate values with respect to the same.
![Week6-question5](https://github.com/illinoistech-itm/kphadatare/blob/master/ITMO-544/images/WhatsApp%20Image%202017-10-07%20at%209.47.09%20PM.jpeg)

# 6. Take the data table in Figure 1.10 and add a column that identifies the cost of each item. Scale the costs to the same unit—for example, the cost of 1 terabyte of RAM, 1 terabyte of disk, and 1 terabyte of L1 cache. Add another column that shows the ratio of performance to cost. (Note – I know 1 terrabyte of ram doesn’t exist – you need to extrapolate.) 


# 7. What is the theoretical model that describes the different kinds of scaling techniques?
Ans: The basic strategy to build a system or model is to design it with scalability in mind from the start & by avoiding designing elements that will prevent the additional scaling in the future.
Initially, it should include approximations of the desired scale, the size of the data which will be stored, the throughput of the system which it will process & amount of traffic it receives & expected growth rates. All these factors guide the model which will then follow all the scaling techniques.
The theoretical model can be designed in following way:
Identify the Bottlenecks: Every system has bottlenecks where the congestion occurs. It is a point where the resources are starved & limits the performance of the system. If the system is underperforming, then the bottlenecks can be fixed. So that the system would perform better. Also, know the location of the bottlenecks is better, so that the future problems can be avoided.
Reengineering Components: Sometimes, the scaling issues can be resolved using the adjustments to the current system. Rewriting the parts of the system is called reengineering. It is done to improve the speed & functionality & resource consumption. 
Measure Results: Scaling solutions should be evaluated using evidence & meaning from the data which is collected from the real system. The process can be performed as taking measurement, trying solution, repeat the same to see the effects. If the effects are less or negative, then solution should not be deployed & vice versa.  For that we need to measure before & after changes which are being made for effective results.
Be Proactive: The best time to fix the bottleneck is before it becomes the problem. It is a best strategy to predict the problems far enough in advance. So that there will be enough time for engineer to find out correct solution. This means that one should be always collecting measurements to predict the bottlenecks.
(Section: 5.1, 5,1.1, 5,1.2, 5,1.3, 5,1.4)

# 8. How do you know when scaling is needed?
Ans: The scaling is needed for following conditions:
•	Once the system is running & performance limits are discovered that is when the system requires the scaling. 
•	Every system has bottlenecks where the congestion occurs. It is a point where the resources are starved & limits the performance of the system. 
•	If the system is underperforming, that’s when scaling is needed to the system.
(Section: 5.1)

# 9. What are the most common scaling techniques and how do they work? When are they most appropriate to use?
Ans: The common scaling techniques are as follows:
•	Replicate the entire system (horizontal duplication)
•	Split the system into individual functions, services, or resources (functional or service splits)
•	split the system into individual chunks (lookup or formulaic splits)

Horizontal Duplication: It increases throughput by replicating the services. It is also called as Horizontal Scaling. 
Eg: Web server uses many replicas work behind the load balancer.
This kind of scaling does not work well with increase in data or with complex transactions which needs to be taken care by different handling. To take care of this situation, each transaction can be run independently on all the replicas. It helps to improve the performance which is proportional to the number of replicas.
Techniques that involve x-axis scaling include the following:
• Adding more machines or replicas
• Adding more disk spindles
• Adding more network connections

Functional Or Service Splits: It means that scaling up the system by splitting each individual function to allocate additional resources. To use the separating functions, it needs to be loosely coupled. It involves splitting of work flows & transaction types. 
This technique involves the following:
• Splitting by function, with each function on its own machine
• Splitting by function, with each function on its own pool of machines
• Splitting by transaction type
• Splitting by type of user
Look Up Oriented Split: Here, the system can be scaled up by splitting the data in identifiable segments each of which is given dedicated resources. This technique is like Functional or Service Splits except it divides the data instead of processing. Eg: splitting or dividing the data base by date. If the database reaches its limit, it can be scaled up by adding new database server for upcoming data. The data can be split geographically to access it quickly.
(Section: 5.3, 5.3.1, 5.3.2, 5.3.3) 

# 10. Which scaling techniques also improve resiliency?
Ans: The scaling techniques which improved resiliency are as follow:
•	Replicate the entire system (horizontal duplication)
•	Split the system into individual functions, services, or resources (functional or service splits)
•	split the system into individual chunks (lookup or formulaic splits)

Horizontal Duplication: It increases throughput by replicating the services. It is also called as Horizontal Scaling. 
Eg: Many replicas work behind the load balancer.
This kind of scaling does not work well with increase in data or with complex transactions which needs to be taken care by different handling. To take care of this situation, each transaction can be run independently on all the replicas. It helps to improve the performance which is proportional to the number of replicas.
Techniques that involve x-axis scaling include the following:
• Adding more machines or replicas
• Adding more disk spindles
• Adding more network connections

(Section: 5.3, 5.3.1) 

# 11. Describe how your environment uses a CDN or research how it could be used.
Ans: CDN is web acceleration service that delivers content more efficiently on behalf of the service. CDNs cache content on servers all over the world. CDN does not copy all the content to all caches. It notices the usage trends & determine where to cache certain content.  CDNs have extremely large & fast connections to the internet. They have more bandwidth to the internet than most of websites. CDNs place their cache servers in the data centers of ISPs in arrangement called colocation. As the result, ISP to ISP traffic is reduced. The website that uses CDN, would upload a copy of the image to the CDN, which then serves if from URL that pints to CDNs server. The website then uses the CDNs URL to refer the image. Uploading the content to CDN is automatic. To activate the CDN, we need to replace the native URL in the HTML which Is being generated with URLs that pint to the CDNs server. CDNs are the great choices for small sites. Once the site becomes extremely large, it becomes more cost effective to run your own private CDN. CDNs are now completing on price, geographic coverage & list of new features. Some CDNs specialize in a part of the world by offering lower prices for websites.
(Section: 5.8)

# 12. Research Amdahl’s Law and explain how it relates to the AKF Scaling Cube.
Ans: The law is used for finding the maximum improvement which is possible by improving a part of the system. The law states that, in parallelization, if P is proportional to the system which is made parallel & 1-P is the proportion which is serial, then maximum speed up which can be achieved Using N number of processors is (1/(1-P) )+(P/N).
For eg: If one process is running, it takes 10 hours to complete by single processing core. Also, there is one program which needs to be executed alone, which cannot be parallelized for one hour. So, the system cannot be parallelized for this one hour but for rest 9 hours can be done. So, the process’s minimum execution time cannot be less than that of critical one hour where it was not parallelized.
In AFK scaling cube, we deal with system of parallelization which is related as that of Amdahl’s law. Eg: In AFK scaling cube, in horizontal scaling, we have many replicas but only one replica executes alone for the critical time being. Similarly, functional & look up split, if the remaining services are dependent on the critical process, until it completes the job cannot be done even if we have many dedicated process to finish the job.
((Section: 5.3, 5.3.1, 5.3.2, 5.3.3) 




