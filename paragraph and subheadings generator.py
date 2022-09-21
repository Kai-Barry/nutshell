import openai

openai.api_key = "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"

topic = 'Chicken'
paragraphAmount = 5 
# Includes intro paragraph

def extract(aiContent):
    return str(aiContent["choices"][0]["text"])

def createWiki(topic, paragraphAmount):

    # Create subheadings
    subheadings = openai.Completion.create(
      model="text-davinci-002",
      prompt=f"Give {paragraphAmount} subheadings, in numbered dot points, that would be found in an informative article about {topic}. The first subheading must be introdution.",
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
        paragraphs.append("\n\n" + subheading + "\n" + extract(paragraph))

    f = open("dino.txt", "w")

    f.write(topic.title() + "\n\n")
    for paragraph in paragraphs:
        f.write(paragraph)
    
    f.close()


createWiki(topic, paragraphAmount)
