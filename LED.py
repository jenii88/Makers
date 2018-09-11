from time import sleep     # Import sleep Library
import RPi.GPIO as GPIO    # Import GPIO Library 
GPIO.setmode(GPIO.BOARD)   # Use Physical Pin Numbering Scheme
button1=16                 # Button 1 is connected to physical pin 16
LED1=22                    # LED 1 is connected to physical pin 22
GPIO.setup(button1,GPIO.IN,pull_up_down=GPIO.PUD_UP) # Make button1 an input, Activate Pull UP Resistor
GPIO.setup(LED1,GPIO.OUT,) # Make LED 1 an Output
BS1=False                  # Set Flag BS1 to indicate LED is initially off
while(1):                  # Create an infinite Loop
        if GPIO.input(button1)==0:            # Look for button 1 press
                print "Button 1 Was Pressed:"
                if BS1==False:                # If the LED is off
                        GPIO.output(LED1,True)# turn it on
                        BS1=True              # Set Flag to show LED1 is now On 
                        sleep(.5)             # Delay
                else:                         # If the LED is on
                        GPIO.output(LED1,False) # Turn LED off
                        BS1=False               # Set Flag to show LED1 is now Off
                        sleep(.5)
GPIO.cleanup()        
def ledButtonControl():
	GPIO.output(LED1,True)
	while(1)
		if GPIO.input(button1)==0:
			#need sql function call to update datebase
			GPIO.output(LED1,False) # Turn LED off
			sleep(.5)
			break	
GPIO.cleanup() 

