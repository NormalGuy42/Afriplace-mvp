class Node:
    def __init__(self,key):
        self.lft = None
        self.right = None
        self.val = key

def inorderSolution(root):
    if root:
        inorderSolution(root.lft)
        print(root.val)
        inorderSolution(root.right)

L = [1, null, 2, 3,]
inorderSolution(L)