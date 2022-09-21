import openai

openai.api_key = "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"

topic = 'Chicken'
paragraphAmount = 4

def extract(aiContent):
    return str(aiContent["choices"][0]["text"])

def createWiki(topic, paragraphAmount):

    # Create subheadings
    subheadings = openai.Completion.create(
      model="text-davinci-002",
      prompt=f"Give {paragraphAmount} one to two word subheadings, in numbered dot points, that would be found in a wikipedia page about {topic}.",
      temperature=0,
      max_tokens=300,
      top_p=1,
      frequency_penalty=0,
      presence_penalty=0
    )

    subheadings = extract(subheadings)

    subheadings = subheadings.split("\n")
    subheadings = [e[3:] for e in subheadings]
    subheadings.insert(0, 'Introduction')

    while "" in subheadings:
        subheadings.remove("")

    # Create paragraphs for the 5 subheadings
    paragraphs = []
    for subheading in subheadings:
        paragraphPrompt = f"We are writing an article. The article will contain several sections. The article topic is {topic}. Only one section needs to be created.\n\nThis is for an article targeted at elementary school aged children. The article should be informative, accurate and relate directly to {topic}. The purpose of the article is to educate children on the topic of {topic}. The format of the section of the article that needs to be written should be several sentences in the form of dot points.\n\nCreate dot points for the section {subheading}:",
        paragraph = openai.Completion.create(
          model="text-davinci-002",
          prompt=paragraphPrompt,
          temperature=0,
          max_tokens=1500,
          top_p=1,
          frequency_penalty=0,
          presence_penalty=0
        )
        paragraphs.append("\n\n" + subheading + "\n" + extract(paragraph))

    f = open("dino.txt", "w")

    f.write(topic.title() + "\n\n")
    for paragraph in paragraphs:
        f.write(paragraph)
    
    f.close()


createWiki(topic, paragraphAmount)