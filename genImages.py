from serpapi import GoogleSearch
import sys

amount = 5

def createImages(topic):
	params = {
		"q": topic,
		"tbm": "isch",
		"api_key": "1",
		"safe": "active"
	}

	search = GoogleSearch(params)
	results = search.get_dict()
	imageInfo = results["images_results"][:amount]
	images = list(map(lambda image: image['original'], imageInfo))

	return images


if len(sys.argv) == 2:
	print("\======/")
	for image in createImages(sys.argv[1]):
		print (image)
else:
	print("Bad args")
