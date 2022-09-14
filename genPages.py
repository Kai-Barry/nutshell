
#Run using python 3.10 on the server
#Set up your own openAPI key

import requests, bs4, openai, os, wikipedia, re

openai.api_key = os.getenv("OPENAI_API_KEY")

"""while True:
	site = pywikibot.Site()
	page = pywikibot.Page(site, u"Main_Page")
	text = page.text
	lines = text.split("\n")
	auto_text = "Amount of times this page has been auto updated: "
	#put_throttle = 0

	if lines[-1].startswith(auto_text):
		lines[-1] = auto_text + str(int(lines[-1][len(auto_text) - 1:]) + 1)
	else:
		lines.append(auto_text + "1")
	new_text = ""
	for line in lines:
		new_text += line + "\n"
	if len(new_text) > 1:
		new_text = new_text[0:-1]
	page.text = new_text
	page.save("bot update Main_Page")
	print (new_text)"""
wikipedia.set_rate_limiting(0)
while True:
	input_text = ""
	url = ""
	subject = ""
	while len(input_text) < 5:
		"""url = requests.get("https://en.wikipedia.org/wiki/Special:Random")
		html = bs4.BeautifulSoup(url.text, "html.parser")
		subject = html.find(id="firstHeading").text #html.title.text
		#subject = subject.strip(" - Wikipedia")
		print("Subject: " + subject)"""
		try:
			subject = wikipedia.random(1)
			print("Subject: " + subject)
			#if subject != re.sub(r'[^A-Za-z0-9() ]+', '', subject):
			#	print("Invalid name")
			#	continue
			wiki = wikipedia.page(subject)
			url = wiki.url
			input_text_orig = wiki.content
			input_text_orig = re.sub(r'\n\s*\n', '\n\n', input_text_orig)
			input_text = input_text_orig.split("== Footnotes ==")[0].split("== See also ==")[0].split("== References ==")[0].split("== External links ==")[0]
		except:
			input_text = ""
	#print ("Existing page:\n\n" + input_text_orig)
	#print ("Existing page stripped:\n\n" + input_text)

	prompt1="Write a wikipedia article for a middle school student about "
	prompt2="Summarise for a middle school student:\n\n"


	token_size = 3
	max_input = 2000 * token_size
	if len(input_text) > max_input:
		input_text = input_text[0:max_input]
	max_chars = 4096 * token_size
	target_chars = max_chars
	if not os.path.exists("/var/www/html/pages/"+subject+".data"):
		page = open("/var/www/html/pages/"+subject+".data", "w")

		"""print ("prompt_size1: " + str(len(prompt1)))
		print ("prompt_size_tokens1: " + str(len(prompt1) / token_size))
		print ("response_Size1: " + str((target_chars - len(prompt1)) / token_size))"""
		tokens1 = round(min(max_chars, ((target_chars - len(prompt1)) / token_size)) / token_size)
		#create wikipedia article from scratch
		response = openai.Completion.create(
			model="text-davinci-002",
			prompt=prompt1 + subject,
			temperature=0.7,
			max_tokens=tokens1,
			top_p=1,
			frequency_penalty=0.5,
			presence_penalty=0.5
		)
		new_article = re.sub(r'\n\s*\n', '\n\n', response.choices[0].text.lstrip())
		#print("new_article:\n" + new_article)

		"""print ("prompt_size2: " + str(len(prompt2) + len(new_article)))
		print ("prompt_size_tokens2: " + str((len(prompt2) + len(new_article)) / token_size))
		print ("response_Size2: " + str((target_chars - (len(prompt2) + len(new_article))) / token_size))"""
		tokens2 = round(min(max_chars, target_chars - (len(prompt2) + len(new_article))) / token_size)
		#print(prompt2 + new_article.replace("\n", " "))
		#Summarised created wikipedia article from scratch
		response2 = openai.Completion.create(
			model="text-davinci-002",
			prompt=prompt2 + new_article.replace("\n", " ") + "\n",
			temperature=0.7,
			max_tokens=tokens2,
			top_p=1,
			frequency_penalty=0.5,
			presence_penalty=0.5
		)
		summarised_new_article = re.sub(r'\n\s*\n', '\n\n', response2.choices[0].text.lstrip())
		#print("summarised_new_article:\n" + summarised_new_article)

		"""print ("prompt_size3: " + str(len(prompt2) + len(input_text)))
		print ("prompt_size_tokens3: " + str((len(prompt2) + len(input_text)) / token_size))
		print ("response_Size3: " + str((target_chars - (len(prompt2) + len(input_text))) / token_size))"""
		tokens3 = round(min(max_chars, target_chars - (len(prompt2) + len(input_text))) / token_size)
		#Summarised wikipedia article
		response3 = openai.Completion.create(
			model="text-davinci-002",
			prompt=prompt2 + input_text.replace("\n", " ") + "\n",
			temperature=0.7,
			max_tokens=tokens3,
			top_p=1,
			frequency_penalty=0.5,
			presence_penalty=0.5
		)
		summarised_article = re.sub(r'\n\s*\n', '\n\n', response3.choices[0].text.lstrip())
		#print("summarised_article:\n" + summarised_article)

		new_text = "#Header Data\n#Title:\n" + subject + \
			"\n#Heading\n" + subject + \
			"\n#Wiki Link\n" + url + \
			"\n#New Article Created By GPT3\n#\======/\n" + new_article + \
			"\n#Summarised New Article Created By GPT3\n#\======/\n" + summarised_new_article + \
			"\n#Summarised Article From Wikipedia\n#\======/\n" + summarised_article
		#print (new_text)
		page.write(new_text)
		page.close()
		#print ("\n\nNew Page:\n\n" + page.text)
	else:
		print("Page exists")
