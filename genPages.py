import openai, os, sys

openai.api_key = os.getenv("OPENAI_API_KEY")

paragraphAmount = 5
# Includes intro paragraph

def extract(aiContent):
	return str(aiContent["choices"][0]["text"])

def isValid(topic):
	valid = openai.Completion.create(
	model="text-davinci-002",
	prompt=f"Respond with 1 if yes and 0 if no. Is {topic} a topic thats valid for an article and not NSFW?",
	temperature=0,
	max_tokens=300,
	top_p=1,
	frequency_penalty=0,
	presence_penalty=0
	)
	return int(''.join(ch for ch in extract(valid) if ch.isalnum()))

def createWiki(topic, paragraphAmount):

	# test = 'test'
    
	if not isValid(topic):
		print("Page invalid or inappropriate")
	#Check page exists
	elif not os.path.exists("/var/www/html/pages/" + topic + ".data"):
		# Create subheadings
		subheadings = openai.Completion.create(
		model="text-davinci-002",
		prompt=f"Give {paragraphAmount} one-word subheadings, in numbered dot points, that would be found in an informative article about {topic}. Make the first subheading an introduction to the topic.",
		temperature=0,
		max_tokens=300,
		top_p=1,
		frequency_penalty=0,
		presence_penalty=0
		)

		subheadings = extract(subheadings)

		subheadings = subheadings.split("\n")
		subheadings = [e[3:] for e in subheadings]

		while "" in subheadings:
			subheadings.remove("")

		# Create paragraphs for the 5 subheadings
		paragraphs = []
		for subheading in subheadings:
			paragraphPrompt = f"Create a single paragraph for an informative article. The overall topic of the article is {topic}. The subtopic for the paragraph to create is {subheading}.\n\nThe purpose of the article is to educate elementary school students. The paragraph needs to be understandable, informative and accurate. Attempt to completely cover all aspects of the subtopic, while being easy to follow. Focus on more generally accepted information. increase the length of the paragraph by elaborating on related topics.",
			paragraph = openai.Completion.create(
			model="text-davinci-002",
			prompt=paragraphPrompt,
			temperature=0,
			max_tokens=1500,
			top_p=1,
			frequency_penalty=0,
			presence_penalty=0
			)
			paragraphs.append("\n***" + subheading + "\n" + extract(paragraph))

		#Format file
		new_text = "#Header Data\n#Title:\n" + topic + \
				"\n#Heading\n" + topic + \
				"\n#Article Created By GPT3\n#\======/"
		for paragraph in paragraphs:
			new_text += paragraph
		new_text += "\n"
		
		#Save file
		f = open("/var/www/html/pages/" + topic + ".data", "w")
		f.write(new_text)
		f.close()
		print ("Success")
	else:
		print("Page exists")


if len(sys.argv) == 2:
	createWiki(sys.argv[1], paragraphAmount)
else:
	print("Bad args")
