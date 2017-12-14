Exercises Chapter 6 P. 143
Please CITE any pages you use for an answer. All answers are in the book, no need to use the web (unless instructed too)


# 1. What are the major sources of failure in distributed computing systems? 
Ans: The major sources are as follows:
Failure Domains: It is bounded area beyond which failure has no impact. It could be prescriptive or descriptive. Determining a failure domain is done within a scope or assumptions about how long the outages are to be considered. 

Software Failure: It’s a common failure in the system in terms of Software Crashes or prematurely exits. There are two categories of crashes: a): Regular Crash b): Panic Crash.
a.	Regular Crash: It occurs when software does something which is prohibited by the operating system. Eg: Because of system bug, the program tries to write a memory which is only read only by the operating system. OS detects it & kills the process.
b.	Panic Crash: When software detects something wrong & decides to exit the course to avoid it. Eg: If internal data structures are corrupted & there is no safe way to rectify it, then it is best to stop work immediately instead of continuing with bad data. Panic Crash is also known to be intentional Crash. 
Sometimes, when software has problem, it does not crash instead it run into infinite loop. This is called as Software Hangs. Here, the server stops processing requests. It can be avoided by many ways. It can be detected by monitoring servers. If the server stops processing requests, it can send signal & after verification, a reply can be generated within a certain amount of time. If the system hands, then error msg can be generated & alert is being sent to the system to restart the system etc.

Physical Failure: It includes the failure of the physical part or the component of the system. It includes CPU, RAM, motherboard, disks, network interface controllers, power supplies etc. If any one of the physical hardware fails, it results in machine failure resulting the system has died. 

Overload Failure: The systems are usually resilient when faced with high levels of loads that can happen as the result of temporary surge in traffic, an intentional attack or automated system querying the system at high rate, probably for malicious reasons.

Human Errors: Even if the systems are more resilient to the hardware & software failures, the remaining failures are like to be due to Human Errors. The strategies for dealing with Human error ca be categorized as getting better humans to get the work done or removing humans from the loop or detecting human errors & working around them. We can get better humans by having better operational practices. If the humans are removed from the loop through automation, they might get sloppy & not do as much as checking for errors during procedure. Detecting human errors & working around them is also function of automation. 
(Section: 6.4, 6.5, 6.6, 6.7, 6.8)


# 2. What are the most common failures: software, hardware, or human? Justify your answer. 
Ans: Software failures are the most common failures among Software, Hardware Or Human errors. 
Software Failures are a common failure in the system in terms of Software Crashes or prematurely exits. There are two categories of crashes: a): Regular Crash b): Panic Crash.

a.	Regular Crash: It occurs when software does something which is prohibited by the operating system. Eg: Because of system bug, the program tries to write a memory which is only read only by the operating system. OS detects it & kills the process.
b.	Panic Crash: When software detects something wrong & decides to exit the course to avoid it. Eg: If internal data structures are corrupted & there is no safe way to rectify it, then it is best to stop work immediately instead of continuing with bad data. Panic Crash is also known to be intentional Crash. 

Sometimes, when software has problem, it does not crash instead it run into infinite loop. This is called as Software Hangs. Here, the server stops processing requests. 

Sometimes a API call or query exercises of an untested code causes a crash or delay or an infinite loop. Such a query is called as Query of death because it kills the service.
(Section: 6.4, 6.5, 6.6, 6.7, 6.8)

# 3. Select one resiliency technique and give an example of a failure and the way in which the resiliency technique would prevent a user-visible outage. Do this for one technique in each of these sections: 6.5, 6.6, 6.7,and 6.8. 
Ans:
Software Crashes: The easiest way to deal with software crash is to restart the software. Sometimes, the problem is transient & a restart is all needed for the system to fix the issue. Sometimes, when software has problem, it does not crash instead it run into infinite loop. This is called as Software Hangs. Here, the server stops processing requests. It can be avoided by many ways. It can be detected by monitoring servers. If the server stops processing requests, it can send signal & after verification, a reply can be generated within a certain amount of time. If the system hands, then error msg can be generated & alert is being sent to the system to restart the system etc.

Physical Failures: Many components of a computer can fail. The parts whose utilization we can monitor can fail such as the CPU, RAM, disks or the network interfaces. Supporting components such as fans, power supplies, batteries & motherboards can fail too.
Eg: The RAM can fail for strange reasons. Sometimes a slight power surge can affect ram or single bit flip flop can cause to malfunction the RAM.
When writing to a parity bit memory, the system counts 1 bits are present in the byte & stores 0 in the parity bit if the total is even or total is odd. If the memory is read, the parity is checked & mismatched are reported to the operating system. This can be used to detect single bit errors or multiple bit errors which do not preserve parity. Also, ECC memory uses two additional bits & hamming code algorithm which can correct single bit errors & detect multiple bit errors.

Overload Failures: The overload failures happen because of high levels of loads which results in temporary surge in traffic or intentional attack or automated systems querying the at high rate for some malicious reasons. 
Eg: Traffic Surges: The systems should be more resilient again temporary periods of high loads. But sometimes it causes Overload failures. The primary strategy for dealing with this problem is graceful degradation. Another strategy to add capacity dynamically. With this approach, a system would detect that a service is becoming overloaded & allocate an unused machine from pool of idle machines that are running but otherwise unconfigured. An automated system would be configuring the machine & use it to add capacity to the overloaded service thereby solving issue.

Human Errors: The strategy to deal with human errors can be categorized as getting better humans, removing humans from the loop & detecting human errors & working around them.
(Section: 6.4, 6.5, 6.6, 6.7, 6.8)

# 4. If a load balancer is being used, the system is automatically scalable and resilient. Do you agree or disagree with this statement? Justify your answer. 
Ans: I agree with the statement, if a load balancer is being used, the system is automatically scalable. If the server fails because of dead machine or network issue or bug, the use of load balancer can help the system to be resilient against these causes. 

If load balancers are used over two machines for 40% utilization of machine, if one machine fails, the other machine will be using 80% utilization of it. In this case, load balancers are being used for resiliency. 

If load balancers are used over two machines for 80% utilization of machine, if one machine fails, the other machine will be using 160% utilization of what machine can handle. The machine will be overloaded & cease to function. In this case the load balancer is used for scalability & not for resiliency.
Therefore, i f a load balancer is being used, the system is automatically scalable and resilient.
(Section: 6.6.3)

# 5. Which resiliency techniques or technologies are in use in your environment? 
Ans: In my environment the following resiliency techniques are being used:

Software Crashes: Here most of the times, we restart the application to fix the issue. If it is not working, then we do restart the system to fix the issues. 

Physical Failures: Here we use power supply which converts the standard electric voltages into levels needed by the computer. We avoid the additional surge of voltages which may hamper the CPU or the other parts of the systems. In term of RAM, we use ECC RAMs to avoid their failures & SSD disks to avoid disk failure.

Overload Failures: When the traffic surges occur, it may damage the system, resulting in Overload failures. To avoid that we use the amplifiers which converts the excessive power convert it & transfer it to CPU or system to avoid overload failures.

Human Errors: We hire only trained human to get rid of human errors. Also, most of the times we automate the systems to avoid human interactions. So that humans can be kept out of the loop.
(Section: 6.4, 6.5, 6.6, 6.7, 6.8)

# 6. Where would you like to add resiliency in your current environment? Describe what you would change and which techniques you would apply. 
Ans: If the software crashes, then we need to restart the software. Sometimes just a restart is all needed for the software to resolve the issue. But this process should be automated. Therefore, we need to add automated process which would do so automatically. This process is called as Process Watcher. But many times, other incorrect programs or bugs causes software crash. Therefore, process watcher must also include the data about the restart status, the time required to restart the system & the logs after restarting the system. It also need to make sure that if the system doesn’t restart then it should escalate this thing with all details to the human to work on this issue.
Therefore, I would like to add resiliency in software crashes using above method.
(Section: 6.4)

# 7. In your environment, give an example of graceful degradation under load, or explain how you would implement it if it doesn’t currently exist. 
Ans: If the machine runs out of some resources such as sockets, memory disks or drive spaces, it shouldn’t crash but instead it should keep serving as many users it could with available resources. This is something which doesn’t degrade gracefully & stop working, instead it works until all the resources are exhausted. This kind of design is called as Graceful Degradation.

If the system is already overloaded with its utilization, the users should experience the slower response instead of no response. So, this kind of design is called as Graceful Degradation design where machine keeps on giving response to the users instead of no response even after being overloaded with its utilization.

When working, if any disk drive fails or CPU core fails or failure in memory, the system should design in such way that it should keep on continuing working with some reduced mode instead of crashing it completely. This is called as Graceful degradation of the system.
(Section: 6.4, 6.5, 6.6, 6.7, 6.8)

# 8. How big can a RAID5 array be? For example, how large can it be before the parity checking scheme is likely to miss an error? How long can the rebuild time be before MTBF puts the system at risk of a second failure? 
Ans: For example: if we are having 4 drives of 1 TB, then the data will be written on 3 drives & 1 drives will be kept for parity. So, the size of the RAID5 array should be greater than Or equal to the size of the smallest drive in the array.  
The time it takes to recover from the failed disk cannot be less than the size of the disk divided by its sequential write speed. For a 72GB disk with an 80MBps write rate we get 72,000MB / 80MBps = 900 seconds, about 15 minutes.

Suppose it takes a week (168 hours) to repair the capacity and the MTBF is 100,000 hours. There is a 168/1,000, 000 × 100 = 1.7 percent, or 1 in 60, chance of a second failure.
Now suppose the MTBF is two weeks (336 hours). In this case, there is a 168/336 × 100 = 50 percent, or 1 in 2, chance of a second failure—the same as a coin flip. Adding an additional replica becomes prudent.
(Section: 6.3.1)


# 9. The phrase “Eat right. Exercise. Die anyway.” is mentioned on page 123. Explain how this relates to distributed computing.
Ans: Distributed computing embraces components failures & system malfunctions. It takes the reality based approach that accept the malfunctions as the fact of life which cannot be avoided as the death in the life which cannot be avoided. 

So, before the system is dead, the system needs a specified hardware & software to run which is like eating right. To increase the resiliency & scalability, selection of hardware such as ECC RAMs to avoid RAM failures, SSDs to avoid disk failures, amplifiers to prevent it from traffic surge overload failures etc. is required which is eating right in the above phrase.

If there is software crash, sometimes just a restart is all needed to resolve the issue. So, to take care of such issues, Process watcher needs to be created which will automate the process of restarting the services. If not, then details should escalate to the human to work on it. If the software hangs, then it should send an alert to the system to restart the services. So, to deal with software hangs issues, a watchdog timer should be created. 

Even if the failure of one of the resources such as sockets, memory disks or drive spaces, it shouldn’t crash but instead it should keep serving as many users it could with available resources. If the system is already overloaded with its utilization, the users should experience the slower response instead of no response. 
Therefore, it is same as Do exercise in above phrase.This is how above phrase can relate to distributed computing.
(Section: 6.2.3)

