from serpapi import GoogleSearch
import sys

amount = 5

def createImages(topic):
	params = {
		"q": topic,
		"tbm": "isch",
		"api_key": "a1f0b96d76a0809f86c5b329dedda1b8b11869c0ac148fd67f085fa48861c021",
		# "api_key": "2f3b3a177216bcf79ad515111a7c60a8db9971bfe71e670a31f5614923a0bfae",
		# "api_key": "51db6ed21e1bdb577f0d4f696df60d26fdd35a595031daa5516b9acffe62b290",
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
